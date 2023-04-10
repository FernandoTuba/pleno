<?php

namespace App\Http\Livewire;

use App\Constants\Mensagem;
use App\Constants\Regra;
use App\Helpers\Helper;
use App\Models\Ceps;
use App\Models\Enderecos;
use App\Models\Pessoas as ModelPessoas;
use App\Rules\Cpf;
use App\Rules\CpfUnique;
use App\Rules\NomeRules;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Http;

class Pessoas extends Component
{
    use LivewireAlert;
    public $pessoa;
    public $pessoa_excluir;
    public $id_pessoa;
    public $nome;
    public $cpf;
    public $nascimento;
    public $nascimento2;
    public $cep;
    public $rua;
    public $numero;
    public $cidade;
    public $estado;
    public $hasEndereco;

    protected $listeners = ['editarDados', 'deletarItem', 'excluirPessoa'];


    public function render()
    {
        $dataTable = $this->dataTable();
        return view('livewire.pessoas', compact('dataTable'));
    }

    public function editarDados($id)
    {
        $this->resetValidation();
        if ($id) {
            $this->pessoa = ModelPessoas::find($id);
            $this->id_pessoa = $this->pessoa->id_pessoa;
            $this->nome = $this->pessoa->nome;
            $this->cpf = Helper::formatCPFToHumans($this->pessoa->cpf);
            $this->nascimento = Helper::formatDateFromDB($this->pessoa->data_nascimento);
            $this->cep = $this->pessoa->endereco ? $this->pessoa->endereco->cep : null;
            $this->rua = $this->pessoa->endereco ? $this->pessoa->endereco->rua : null;
            $this->numero = $this->pessoa->endereco ? $this->pessoa->endereco->numero : null;
            $this->cidade = $this->pessoa->endereco ? $this->pessoa->endereco->cidade : null;
            $this->estado = $this->pessoa->endereco ? $this->pessoa->endereco->estado : null;
        }
    }

    public function limpar()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function rules()
    {
        $this->hasEndereco = !empty($this->cep) || !empty($this->rua) || !empty($this->cidade) || !empty($this->estado || !empty($this->numero));
        return [
            'nome' => [Regra::REQUIRED, new NomeRules($this->id_pessoa)],
            'nascimento2' => [Regra::REQUIRED, Regra::DATE, Regra::BEFORE_TODAY],
            'cpf' => [Regra::REQUIRED, new Cpf, new CpfUnique($this->id_pessoa)],
            'cep' => $this->hasEndereco ? Regra::REGRAS_CEP_REQUIRED : Regra::NULLABLE,
            'rua' => $this->hasEndereco ? Regra::REQUIRED : Regra::NULLABLE,
            'numero' => $this->hasEndereco ? [Regra::REQUIRED, Regra::NUMERIC] : Regra::NULLABLE,
            'cidade' => $this->hasEndereco ? Regra::REQUIRED : Regra::NULLABLE,
            'estado' => $this->hasEndereco ? Regra::REQUIRED : Regra::NULLABLE
        ];
    }

    public function salvar()
    {
        $this->resetValidation();
        $this->nascimento2 = Helper::formatDateToValidation($this->nascimento);
        $this->validate();

        if ($this->pessoa) {
            $this->pessoa->update($this->modelDataPessoa());
            if ($this->hasEndereco) {
                Enderecos::updateOrCreate(
                    [Enderecos::ID_PESSOA => $this->pessoa->id_pessoa],
                    $this->modelDataEndereco($this->pessoa->id_pessoa)
                );
            }
        } else {
            $pessoa = ModelPessoas::create($this->modelDataPessoa());
            if ($this->hasEndereco) {
                Enderecos::create($this->modelDataEndereco($pessoa->id_pessoa));
            }
        }
        $this->alert('success', Mensagem::SAVE_SUCCESS);
    }

    public function deletarItem($id)
    {
        $this->pessoa_excluir = ModelPessoas::find($id);
        $msg = str_replace(':nome', $this->pessoa_excluir->nome, Mensagem::PESSOA_DELETE_CONFIRM);
        $this->confirm('', array_merge(Mensagem::PESSOA_DELETE_CONFIRM_CONFIG, [ 'html' => $msg ]));
    }

    public function excluirPessoa()
    {
        if ($this->pessoa_excluir->endereco) {
            $this->pessoa_excluir->endereco->delete();
        }
        $this->pessoa_excluir->delete();
        $this->alert('success', Mensagem::DELETE_SUCCESS);
    }

    private function dataTable()
    {
        $dados = ModelPessoas::orderBy(ModelPessoas::NOME)->get();

        foreach($dados as $key => $item){
            $rows[$key] = [
                'id' => $item->id_pessoa,
                'nome' => $item->nome,
                'cpf' => Helper::formatCPFToHumans($item->cpf),
                'cidade' => $item->endereco ? $item->endereco->cidade . ' / ' . $item->endereco->estado : null,
            ];
        }

        return [
            'title' => 'Lista de pessoas',
            'rows' => $rows ?? [],
            'headers' => [
                'nome' => 'Nome',
                'cpf' => 'CPF',
                'cidade' => 'Cidade',
            ],
            'cols' => [
                'nome' => 5,
                'cpf' => 2,
                'cidade' => 3,
                'opcoes' => 2
            ],
            'metodos' => [
                'deletar' => true,
                'editar' => true,
            ]
        ];
    }

    public function modelDataPessoa()
    {
        return [
            'nome' => $this->nome,
            'cpf' => Helper::removePunctuation($this->cpf),
            'data_nascimento' => $this->nascimento2,
        ];
    }

    public function modelDataEndereco($id_pessoa = null)
    {
        return [
            'id_pessoa' => $id_pessoa ?? $this->id_pessoa,
            'cep' => $this->cep,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'cidade' => $this->cidade,
            'estado' => $this->estado
        ];
    }

    public function updatedCep()
    {
        if (strlen($this->cep) == 9) {
            $cep = Ceps::where(Ceps::CEP, $this->cep)->first();
            if ($cep) {
                $this->rua = $cep->rua;
                $this->cidade = $cep->cidade;
                $this->estado = $cep->estado;
            }
        }
    }



}
