<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('ceps/{cep}', [ApiController::class, 'ceps']);
Route::post('cep', [ApiController::class, 'cep']);
Route::post('conta', [ApiController::class, 'conta']);
Route::post('movimentacao', [ApiController::class, 'movimentacao']);
Route::get('contas/{cpf}', [ApiController::class, 'contas']);
Route::get('contas/{conta}/extrato', [ApiController::class, 'extrato']);
Route::delete('conta/{conta}', [ApiController::class, 'deleteConta']);
