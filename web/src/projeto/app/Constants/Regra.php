<?php

namespace App\Constants;

use phpDocumentor\Reflection\Types\Null_;

class Regra
{
    // REGRAS PADRÃO
    const REGRAS_IMAGEM_NULLABLE = [self::NULLABLE, self::MIMES_IMG, self::MAX_5000, self::IMAGE];
    const REGRAS_CEP_REQUIRED = [self::REQUIRED, self::SIZE_CEP];
    const REGRAS_TELEFONE_REQUIRED = [self::REQUIRED, self::SIZE_TEL];
    const REGRAS_URL_NULLABLE = [self::NULLABLE, self::URL, self::SIZE_URL];
    const REGRAS_SENHA = [self::REQUIRED, self::MIN_6];

    // REGRAS SIMPLES
    const SIZE_CEP = 'size:9';
    const SIZE_CONTA = 'size:8';
    const SIZE_TEL = 'between:14,15';
    const SIZE_URL = 'max:1000';
    const REQUIRED = 'required';
    const URL = 'url';
    const EMAIL = 'email';
    const TITULO_UNIQUE = 'titulo.unique';
    const DATE = 'date';
    const HORARIO = 'date_format:H:i:s';
    const NULLABLE = 'nullable';
    const IMAGE = 'image';
    const MAX = 'max';
    const MAX_100 = 'max:100';
    const MAX_300 = 'max:300';
    const MAX_3000 = 'max:3000';
    const MAX_10000 = 'max:10000';
    const NOME_UNIQUE = 'nome.unique';
    const NUMERIC = 'numeric';
    const UNIQUE = 'unique';
    const EMAIL_UNIQUE = 'email.unique';
    const EMAIL_REQUIRED = 'required|email';
    const RESPONSAVEL_EMAIL_UNIQUE = 'responsavel_email.unique';
    const SUBDOMINIO_UNIQUE = 'sub_dominio.unique';
    const CIDADE_UNIQUE = 'id_cidade.unique';
    const SENHA_MIN = 'senha.min';
    const UNIQUE_USERS = 'unique:users';
    const MIN = 'min';
    const MIN_1 = 'min:1';
    const MIN_6 = 'min:6';
    const MIN_8 = 'min:8';
    const AFTER = 'after';
    const AFTER_OR_EQUAL = 'after_or_equal';
    const RESPONSAVEL_TELEFONE_BETWEEN = 'responsavel_telefone.between';
    const BETWEEN = 'between';
    const AFTER_TODAY = 'after:today';
    const BEFORE_TODAY = 'before:today';
    const GTE = 'gte';
    const MIMES_IMG = 'mimes:jpg,jpeg,png,svg';
    const MIMES_PDF = 'mimes:pdf';
    const MAX_1024 = 'max:1024';
    const MAX_5000 = 'max:5000';
    const STRING = 'string';
    const CONFIRMED = 'confirmed';
}
