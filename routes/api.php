<?php

use App\Http\Controllers\api\PessoaController;
use App\Http\Controllers\api\ProfissaoController;
use App\Models\Profissao;
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
*
/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */



Route::any('pessoa/filter', [PessoaController::class, 'filter']);
Route::get('pessoa', [PessoaController::class, 'index']);
Route::post('pessoa', [PessoaController::class, 'store']);
Route::get('pessoa/{id}', [PessoaController::class, 'show']);
Route::put('pessoa/{id}', [PessoaController::class, 'update']);
Route::delete('pessoa/{id}', [PessoaController::class, 'destroy']);

Route::get('profissao/{id}/pessoa', [ProfissaoController::class, 'pessoa']);