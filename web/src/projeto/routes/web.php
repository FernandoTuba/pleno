<?php

use App\Http\Controllers\ContasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovimentacoesController;
use App\Http\Controllers\PessoasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pessoas', [PessoasController::class, 'index'])->name('pessoas');
Route::get('/contas', [ContasController::class, 'index'])->name('contas');
Route::get('/movimentacoes', [MovimentacoesController::class, 'index'])->name('movimentacoes');
