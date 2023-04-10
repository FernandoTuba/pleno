<?php

namespace App\Rules;

use App\Helpers\Helper;
use App\Models\Pessoas;
use Illuminate\Contracts\Validation\Rule;

class CpfUnique implements Rule
{
    private $pessoaId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($pessoaId = null)
    {
        $this->pessoaId = $pessoaId;
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
        $pessoa = Pessoas::where(Pessoas::CPF, Helper::removePunctuation($value));

        if ($this->pessoaId) {
            $pessoa->where(Pessoas::PRIMARY_KEY, '!=', $this->pessoaId);
        }

        $pessoa = $pessoa->first();
        return empty($pessoa);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'CPF já cadastrado';
    }
}
