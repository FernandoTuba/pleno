<?php

namespace App\Rules;

use App\Helpers\Helper;
use App\Models\Pessoas;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class Maioridade implements Rule
{
    private $model_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($model_id = null)
    {
        $this->model_id = $model_id;
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
        $pessoa = Pessoas::where(Pessoas::CPF, Helper::removePunctuation($value))->first();

        $idade = 0;
        list($anoNasc, $mesNasc, $diaNasc) = explode('-', $pessoa->data_nascimento);
        $idade = date("Y") - $anoNasc;
        if (date("m") < $mesNasc){
            $idade -= 1;
        } elseif ((date("m") == $mesNasc) && (date("d") <= $diaNasc - 1) ){
            $idade -= 1;
        }
        return $idade > 17;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Menor de idade';
    }
}
