<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Ceps;
use App\Models\Contas;
use App\Models\Movimentacoes;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function ceps($cep)
    {
        return Ceps::select(Ceps::CEP, Ceps::RUA, Ceps::CIDADE, Ceps::ESTADO)->where(Ceps::CEP, $cep)->get();
    }

    public function contas($cpf)
    {
        $contas = Contas::where(Contas::CPF, $cpf)->get();
        if (empty($contas)) {
            return [];
        } else {
            foreach ($contas as $conta) {
                $dados = [
                    'conta' => $conta->conta,
                    'data'  => now(),
                    'saldo'  => Helper::calculaSaldo($conta->movimentacoes)
                ];
            }
        }

        return $dados;
    }

    public function cep(Request $request)
    {
        $dados = $request->only('cep', 'rua', 'cidade', 'estado');

        $cep = Ceps::create([
            'cep' => $dados['cep'],
            'rua' => $dados['rua'],
            'cidade' => $dados['cidade'],
            'estado' => $dados['estado'],
        ]);

        return [
            'id' => $cep->id_cep,
            'cep' => $cep->cep,
            'rua' => $cep->rua,
            'cidade' => $cep->cidade,
            'estado' => $cep->estado,
            'mensagem' => 'Cep cadastrado com sucesso',
        ];
    }

    public function movimentacao(Request $request)
    {
        $dados = $request->only('conta', 'acao', 'valor');

        $conta = Contas::where(Contas::CONTA, $dados['conta'])->first();
        if (!empty($conta)) {
            $movimentacao = Movimentacoes::create([
                'id_conta' => $conta->id_conta,
                'acao' => $dados['acao'],
                'valor' => $dados['valor'],
                'data_movimentacao' => now()
            ]);

            return [
                'data' => $movimentacao->data_movimentacao,
                'conta' => $conta->conta,
                'valor' => $movimentacao->valor,
                'acao' => $movimentacao->acao,
                'mensagem' => 'Movimentacao cadastrada com sucesso',
            ];
        } else {
            return [
                'mensagem' => 'Conta não encontrada',
            ];
        }


    }

    public function conta(Request $request)
    {
        $dados = $request->only('cpf', 'conta');

        $conta = Contas::create([
            'cpf' => $dados['cpf'],
            'conta' => $dados['conta'],
            'data_criacao' => now()
        ]);

        return [
            'id' => $conta->id_conta,
            'cpf' => $conta->cpf,
            'conta' => $conta->conta,
            'mensagem' => 'Conta cadastrada com sucesso',
        ];
    }

    public function extrato($conta)
    {
        $conta = Contas::where(Contas::CONTA, $conta)->first();

        if (!empty($conta->movimentacoes)) {
            foreach ($conta->movimentacoes as $movimentacao) {
                $dados[] = [
                    'data' => $movimentacao->data_movimentacao,
                    'valor' => $movimentacao->valor
                ];
            }
            return [
                'movimentacoes' => $dados
            ];
        } else {
            return [];
        }
    }

    public function deleteConta($conta)
    {
        $model = Contas::where(Contas::CONTA, $conta)->first();

        if (!empty($model)) {
            $movimentacoes = Movimentacoes::where(Movimentacoes::ID_CONTA, $model->id_conta)->delete();
            $conta = $model->delete();
            if ($movimentacoes && $conta) {
                return [
                    'Mensagem' => 'Conta excluída com sucesso'
                ];
            } else {
                return [
                    'Mensagem' => 'Erro ao excluir'
                ];
            }
        }

        return [
            'Mensagem' => 'Conta não encontrada'
        ];
    }
}
