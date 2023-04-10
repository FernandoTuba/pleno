<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    use HasFactory;

    const PRIMARY_KEY = 'id_endereco';
    const ID_PESSOA = 'id_pessoa';
    const CEP = 'cep';
    const RUA = 'rua';
    const NUMERO = 'numero';
    const CIDADE = 'cidade';
    const ESTADO = 'estado';
    protected $table = 'enderecos';
    protected $primaryKey = self::PRIMARY_KEY;
    public $timestamps = false;

    protected $fillable = [
        self::ID_PESSOA,
        self::CEP,
        self::RUA,
        self::NUMERO,
        self::CIDADE,
        self::ESTADO
    ];
}
