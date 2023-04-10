<?php

namespace App\Http\Controllers;

use App\Models\Ceps;
use App\Models\Contas;
use App\Models\Movimentacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function ceps()
    {
        // dd(333333333333333333333333);
        return 'okkkkkkkkk';
        // return 'aaaaaaaa';
        // return Ceps::all();
        // dd('ceps');
        // $response = Http::get('http://localhost:81');
        // dd(Ceps::all(), Contas::all(), Movimentacoes::all());
    }
}
