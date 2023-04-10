<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoas extends Model
{
    use HasFactory;

    const PRIMARY_KEY = 'id_pessoa';
    const NOME = 'nome';
    const DATA_NASCIMENTO = 'data_nascimento';
    const CPF = 'cpf';
    protected $table = 'pessoas';
    protected $primaryKey = self::PRIMARY_KEY;
    public $timestamps = false;

    protected $fillable = [
        self::NOME,
        self::DATA_NASCIMENTO,
        self::CPF,
    ];

    public function endereco()
    {
        return $this->hasOne(Enderecos::class, Enderecos::ID_PESSOA);
    }
}
