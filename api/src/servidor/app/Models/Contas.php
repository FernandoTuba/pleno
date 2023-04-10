<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contas extends Model
{
    use HasFactory;

    const PRIMARY_KEY = 'id_conta';
    const DATA_CRIACAO = 'data_criacao';
    const CPF = 'cpf';
    const CONTA = 'conta';
    protected $table = 'contas';
    protected $primaryKey = self::PRIMARY_KEY;
    public $timestamps = false;

    protected $fillable = [
        self::DATA_CRIACAO,
        self::CPF,
        self::CONTA
    ];
}
