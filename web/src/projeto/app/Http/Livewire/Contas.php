<?php

namespace App\Http\Livewire;

use App\Constants\Mensagem;
use App\Constants\Regra;
use App\Helpers\Helper;
use App\Models\Contas as ModelContas;
use App\Models\Pessoas as ModelPessoas;
use App\Models\Movimentacoes as ModelMovimentacoes;
use App\Rules\ContaUnique;
use App\Rules\Maioridade;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Contas extends Component
{
    use LivewireAlert;
    public $conta;
    public $conta_id;
    public $conta_excluir;
    public $cpf;
    public $numero;

    protected $listeners = ['editarDados', 'deletarItem', 'excluirConta'];


    public function render()
    {
        $dataTable = $this->dataTable();
        $pessoas = ModelPessoas::orderBy(ModelPessoas::NOME)->get();
        return view('livewire.contas', compact('dataTable', 'pessoas'));
    }

    public function editarDados($id)
    {
        $this->resetValidation();
        if ($id) {
            $this->conta = ModelContas::find($id);
            $this->conta_id = $this->conta->id_conta;
            $this->cpf = $this->conta->cpf;
            $this->numero = $this->conta->conta;
        }
    }

    public function limpar()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function rules()
    {
        return [
            'numero' => [Regra::REQUIRED, Regra::SIZE_CONTA, new ContaUnique($this->conta_id)],
            'cpf' => [Regra::REQUIRED, new Maioridade()],
        ];
    }

    public function salvar()
    {
        $this->resetValidation();
        $this->validate();

        if ($this->conta) {
            $this->conta->update($this->modelDataConta(false));
        } else {
            ModelContas::create($this->modelDataConta(true));
        }
        $this->reset('cpf','numero','conta_id');
        $this->alert('success', Mensagem::SAVE_SUCCESS);
    }

    public function deletarItem($id)
    {
        $this->conta_excluir = ModelContas::find($id);
        $saldo = Helper::calculaSaldo($this->conta_excluir->movimentacoes);
        if ($saldo > 0) {
            $msg = str_replace(':conta', $this->conta_excluir->conta, Mensagem::CONTA_DELETE_CONFIRM_SALDO);
            $msg = str_replace(':saldo', $saldo, $msg);
        } else {
            $msg = str_replace(':conta', $this->conta_excluir->conta, Mensagem::CONTA_DELETE_CONFIRM);
        }

        $this->confirm('', array_merge(Mensagem::CONTA_DELETE_CONFIRM_CONFIG, [ 'html' => $msg ]));
    }

    public function excluirConta()
    {
        ModelMovimentacoes::where(ModelMovimentacoes::ID_CONTA, $this->conta_excluir->id_conta)->delete();
        $this->conta_excluir->delete();
        $this->alert('success', Mensagem::DELETE_SUCCESS);
    }

    private function dataTable()
    {
        $dados = ModelContas::orderBy(ModelContas::CONTA)->get();

        foreach($dados as $key => $item){
            $rows[$key] = [
                'id' => $item->id_conta,
                'nome' => $item->pessoa->nome,
                'cpf' => Helper::formatCPFToHumans($item->cpf),
                'numero' => $item->conta
            ];
        }

        return [
            'title' => 'Lista de contas',
            'rows' => $rows ?? [],
            'headers' => [
                'nome' => 'Nome',
                'cpf' => 'CPF',
                'numero' => 'Número da conta',
            ],
            'cols' => [
                'nome' => 5,
                'cpf' => 2,
                'numero' => 3,
                'opcoes' => 2
            ],
            'metodos' => [
                'deletar' => true,
                'editar' => true,
            ]
        ];
    }

    public function modelDataConta($create)
    {
        $dados = [
            'cpf' => Helper::removePunctuation($this->cpf),
            'conta' => $this->numero
        ];

        if ($create) {
            $dados[ModelContas::DATA_CRIACAO] = now();
        }

        return $dados;
    }

}
