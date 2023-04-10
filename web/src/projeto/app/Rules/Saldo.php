<?php

namespace App\Rules;

use App\Helpers\Helper;
use App\Models\Contas;
use App\Models\Movimentacoes;
use Illuminate\Contracts\Validation\Rule;

class Saldo implements Rule
{
    private $valor;
    private $tipo;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($valor = null, $tipo = null)
    {
        $this->valor = $valor;
        $this->tipo = $tipo;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->tipo == Movimentacoes::DEPOSITAR || empty($this->valor)) {
            return true;
        } else {
            $conta = Contas::find($value);
            $saldo = Helper::calculaSaldo($conta->movimentacoes);
            $intervalo = now()->diffInDays($conta->data_criacao);

            if (
                ($intervalo < 5 && $saldo - $this->valor < 0) ||
                ($intervalo > 4 && $intervalo < 10 && $saldo - $this->valor < -500) ||
                ($intervalo > 9 && $intervalo < 15 && $saldo - $this->valor < -1000) ||
                ($intervalo > 14 && $saldo - $this->valor < -5000))
            {
                return false;
            } else {
                return true;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Conta sem permissão de ter o saldo negativo';
    }
}
