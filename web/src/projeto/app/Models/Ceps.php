<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ceps extends Model
{
    use HasFactory;

    protected $table = 'ceps';
    protected $primaryKey = self::PRIMARY_KEY;

    public $timestamps = false;

    const PRIMARY_KEY = 'id_cep';
    const CEP = 'cep';
    const RUA = 'rua';
    const CIDADE = 'cidade';
    const ESTADO = 'estado';

    protected $fillable = [
        self::CEP,
        self::RUA,
        self::CIDADE,
        self::ESTADO
    ];
}
