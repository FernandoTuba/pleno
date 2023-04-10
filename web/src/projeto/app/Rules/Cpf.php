<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Cpf implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $value);

        /**
         * Verifica se foi informado todos os digitos corretamente
         * ou
         * Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
         */
        if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($i = 9; $i < 11; $i++) {
            for ($j = 0, $soma = 0; $j < $i; $j++) {
                $soma += $cpf[$j] * (($i + 1) - $j);
            }

            $soma = ((10 * $soma) % 11) % 10;
            if ($cpf[$j] != $soma) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'CPF inválido';
    }
}
