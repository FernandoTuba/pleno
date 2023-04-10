<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contas extends Model
{
    use HasFactory;

    protected $table = 'contas';
    protected $primaryKey = self::PRIMARY_KEY;

    public $timestamps = false;

    const PRIMARY_KEY = 'id_conta';
    const DATA_CRIACAO = 'data_criacao';
    const CPF = 'cpf';
    const CONTA = 'conta';

    protected $fillable = [
        self::DATA_CRIACAO,
        self::CPF,
        self::CONTA
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoas::class, self::CPF, Pessoas::CPF);
    }

    public function movimentacoes()
    {
        return $this->hasMany(Movimentacoes::class, self::PRIMARY_KEY, self::PRIMARY_KEY);
    }
}
