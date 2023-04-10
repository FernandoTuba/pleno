<?php

namespace App\Rules;

use App\Helpers\Helper;
use App\Models\Contas;
use App\Models\Pessoas;
use Illuminate\Contracts\Validation\Rule;

class ContaUnique implements Rule
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
        $conta = Contas::where(Contas::CONTA, $value);

        if ($this->model_id) {
            $conta->where(Contas::PRIMARY_KEY, '!=', $this->model_id);
        }

        $conta = $conta->first();
        return empty($conta);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Conta já cadastrada';
    }
}
