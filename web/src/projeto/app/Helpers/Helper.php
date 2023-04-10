<?php

namespace App\Helpers;

use App\Models\Movimentacoes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class Helper
{
    public static function formatCPFToHumans($value)
    {
        $cpf = preg_replace("/\D/", '', $value);
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf);
    }

    public static function formatDateFromDB($date): string
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public static function formatDateToDB($date): string
    {
        return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    public static function removePunctuation($string)
    {
        return preg_replace('/[\D]/', '', $string);
    }

    public static function formatCEPToHumans($cep)
    {
        if (empty($cep)) { return $cep; }

        $a = substr($cep, 0, 2);
        $b = substr($cep, 2, 3);
        $c = substr($cep, 5, 3);

        return "{$a}{$b}-{$c}";
    }

    public static function formatDateToValidation($date)
    {
        return implode('-', array_reverse(explode('/', $date)));
    }

    public static function getCEPInformation($cep)
    {

        $cep = self::removePunctuation($cep);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://viacep.com.br/ws/$cep/json/");
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, true);
    }

    public static function calculaPorcentagem(Collection $iterable, $quantidade)
    {
        $iterable->each(function ($item) use ($quantidade) {
            $item->porcentagens = [
                'quantidade' => number_format(($item->quantidade / $quantidade) * 100, 2, ',', '.')
            ];
        });
    }

    public function calculaIdade($data){
        $idade = 0;
        $data_nascimento = date('Y-m-d', strtotime($data));
        list($anoNasc, $mesNasc, $diaNasc) = explode('-', $data_nascimento);
        $idade = date("Y") - $anoNasc;
        if (date("m") < $mesNasc){
            $idade -= 1;
        } elseif ((date("m") == $mesNasc) && (date("d") <= $diaNasc) ){
            $idade -= 1;
        }
        return $idade;
    }

    public static function formatFloatFromDB($valor)
    {
        return str_replace('.', ',', round( $valor, 2 ));
    }

    public static function formatFloat($valor)
    {
        return str_replace(',', '.', round( $valor, 2 ));
    }

    public static function calculaSaldo($movimentacoes)
    {
        if (empty($movimentacoes)) {
            return null;
        } else {
            $total = 0;
            foreach ($movimentacoes as $mov) {
                if ($mov->acao == Movimentacoes::DEPOSITAR) {
                    $total += $mov->valor;
                } else {
                    $total -= $mov->valor;
                }
            }
        }
        return str_replace('.', ',', round( $total, 2 ));
    }
}

