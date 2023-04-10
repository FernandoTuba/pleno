<?php

namespace App\Rules;

use App\Casts\PostgresEncrypted;
use App\Constants\CamposRegistro;
use App\Helpers\Helper;
use App\Models\PessoaPessoa;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class EmailCadastrado implements Rule
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
        $pessoa = PessoaPessoa::where(PessoaPessoa::LETRA2, $value[0])
            ->where(PostgresEncrypted::whereDecryptColumn(PessoaPessoa::EMAIL), $value)
            ->where(CamposRegistro::ID_APLICACAO_CRIADOR, 1)
        ;

        if ($this->pessoaId) {
            $pessoa->where(PessoaPessoa::PRIMARY_KEY, '!=', $this->pessoaId);
        }
        $pessoa = $pessoa->first();

        if ($pessoa) {
            return false;
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
        return 'E-mail já cadastrado';
    }
}
