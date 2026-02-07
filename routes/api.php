<?php

use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\EstudanteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/estudante',[EstudanteController::class,'registerEstudante']);
Route::get('/estudante',[EstudanteController::class,'visualizarEstudante']);
Route::put('/estudante/{id}',[EstudanteController::class,'updateEstudante']);
Route::delete('/estudante/{id}',[EstudanteController::class,'deleteEstudante']);
Route::get('/estudante/relatorio',[EstudanteController::class,'relatorioEstudante']);
Route::post('/login',[AutenticacaoController::class,'login']);
Route::post('/registar',[AutenticacaoController::class,'registar']);