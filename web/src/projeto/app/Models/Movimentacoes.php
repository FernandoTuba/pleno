<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacoes extends Model
{
    use HasFactory;

    protected $table = 'movimentacoes';
    protected $primaryKey = self::PRIMARY_KEY;

    public $timestamps = false;

    const PRIMARY_KEY = 'id_movimentacao';
    const ID_CONTA = 'id_conta';
    const DATA_MOVIMENTACAO = 'data_movimentacao';
    const ACAO = 'acao';
    const VALOR = 'valor';
    const DEPOSITAR = 'Depositar';
    const RETIRAR = 'Retirar';

    protected $fillable = [
        self::ID_CONTA,
        self::DATA_MOVIMENTACAO,
        self::ACAO,
        self::VALOR
    ];
}
