<?php

namespace App\Http\Livewire;

use App\Constants\Mensagem;
use App\Constants\Regra;
use App\Helpers\Helper;
use App\Models\Contas as ModelContas;
use App\Models\Movimentacoes as ModelMovimentacoes;
use App\Models\Pessoas as ModelPessoas;
use App\Rules\Saldo;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Movimentacoes extends Component
{
    use LivewireAlert;
    public $movimentacoes;
    public $movimentacao;
    public $movimentacao_id;
    public $movimentacao_excluir;
    public $cpf;
    public $valor;
    public $id_conta;
    public $acao;
    public $show = false;

    public function render()
    {
        $pessoas = ModelPessoas::orderBy(ModelPessoas::NOME)->get();
        if (!empty($this->cpf) && !empty($this->id_conta)) {
            $dataTable = $this->dataTable();
        } else $dataTable = null;
        $contas = $this->cpf ? ModelContas::where(ModelContas::CPF, $this->cpf)->orderBy(ModelContas::CONTA)->get() : null;

        return view('livewire.movimentacoes', compact('dataTable', 'contas', 'pessoas'));
    }

    public function limpar()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function rules()
    {
        return [
            'valor' => [Regra::REQUIRED, Regra::NUMERIC],
            'acao' => Regra::REQUIRED,
            'id_conta' => new Saldo(Helper::formatFloat($this->valor), $this->acao)
        ];
    }

    public function salvar()
    {
        $this->resetValidation();
        $this->validate();

        ModelMovimentacoes::create($this->modelDataMovimantacao());
        $this->reset('acao','valor');
        $this->alert('success', Mensagem::SAVE_SUCCESS);
    }

    private function dataTable()
    {
        $dados = ModelMovimentacoes::where(ModelMovimentacoes::ID_CONTA, $this->id_conta)->orderByDesc(ModelMovimentacoes::DATA_MOVIMENTACAO)->get();
        foreach($dados as $key => $item){
            $rows[$key] = [
                'data' => Helper::formatDateFromDB($item->data_movimentacao),
                'valor' => '<span class="color-' . ($item->acao == ModelMovimentacoes::DEPOSITAR ? 'green' : 'red') . '">R$ ' . Helper::formatFloatFromDB($item->valor) . '</span>' ,
            ];
        }

        return [
            'title' => 'Extrato',
            'rows' => $rows ?? [],
            'headers' => [
                'data' => 'Data',
                'valor' => 'Valor'
            ],
            'cols' => [
                'data' => 6,
                'valor' => 6
            ],
        ];
    }

    public function modelDataMovimantacao()
    {
        return [
            'id_conta' => $this->id_conta,
            'data_movimentacao' => now(),
            'acao' => $this->acao,
            'valor' => $this->valor
        ];
    }

    public function updatedCpf()
    {
        $this->reset('id_conta');
    }


}
