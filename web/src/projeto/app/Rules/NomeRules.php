<?php

namespace App\Rules;

use App\Helpers\Helper;
use App\Models\Pessoas;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Foreach_;

class NomeRules implements Rule
{
    private $pessoaId;
    private $mensagem;

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
        $pessoa = Pessoas::where(Pessoas::NOME, '=', $value );

        if ($this->pessoaId) {
            $pessoa->where(Pessoas::PRIMARY_KEY, '!=', $this->pessoaId);
        }

        $pessoa = $pessoa->first();
        if (!empty($pessoa)) {
            $this->mensagem = 'Nome já cadastrado';
            return false;
        }

        $nome = trim($value);
        $nomes =  explode(" ", $nome);
        if (count($nomes) <= 1) {
            $this->mensagem = 'Obrigatório mais de 1 nome';
            return false;
        }

        foreach ($nomes as $nome) {
            if (!ctype_upper($nome[0]) || !ctype_lower(substr($nome,1))) {
                $this->mensagem = 'Nome inválido';
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
        return $this->mensagem;
    }
}
