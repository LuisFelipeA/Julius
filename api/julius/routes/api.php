<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AssinaturaController;
use App\Http\Controllers\Api\MovimentacaoController;
use App\Http\Controllers\Api\SaldoController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ListarAssinaturaController;
use App\Http\Controllers\Api\ListarMovimentacaoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('user', UserController::class);

Route::apiResource('movimentacao', MovimentacaoController::class);

Route::apiResource('assinatura', AssinaturaController::class);

Route::get('/listAssinatura/{id}', [ListarAssinaturaController::class, 'show']);

Route::get('/listMovimentacao/{id}', [ListarMovimentacaoController::class, 'show']);

Route::get('/saldo/{id}', [SaldoController::class, 'show']);

Route::post('/login', [LoginController::class, 'doLogin']);

// Route::apiResource('saldo', SaldoController::class);