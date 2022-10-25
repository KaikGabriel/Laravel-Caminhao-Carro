<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CaminhaoController;
use App\Http\Controllers\CarroController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/



Route::get('/', [HomeController::class, 'MostrarHome'])->name('home');

/*Caminhão */
Route::get('/editar-caminhao', [CaminhaoController::class, 'EditarCaminhao'])->name('editar-caminhao');
Route::get('/cadastrar-caminhao', [CaminhaoController::class, 'CadastroCaminhao'])->name('cadastrar-caminhao');
Route::post('/cadastrar-caminhao', [CaminhaoController::class, 'SalvarBancoCaminhao'])->name('salvar-banco');
Route::delete('/editar-caminhao/{registrosCaminhoes}', [CaminhaoController::class, 'ApagarBancoCaminhao'])->name('apagar-caminhao');

//editar
Route::get('/alterar-caminhao/{registrosCaminhoes}',[CaminhaoController::class,'AlterarCaminhao'])->name('alterar-caminhao');
Route::put('/editar-caminhao/{registrosCaminhoes}',[CaminhaoController::class,'AlterarBancoCaminhao'])->name('alterar-banco-caminhao');





/* CARROS */
Route::get('/editar-carro', [CarroController::class, 'EditarCarro'])->name('editar-carro');
Route::get('/cadastrar-carro', [CarroController::class, 'CadastroCarro'])->name('cadastrar-carro');
Route::post('/cadastrar-carro', [CarroController::class, 'SalvarBancoCarro'])->name('salvar-banco-carro');
Route::delete('/editar-carro/{registrosCarros}', [CarroController::class, 'ApagarBancoCarro'])->name('apagar-carro');

//editar-carro
Route::get('/alterar-carro/{registrosCarros}',[CarroController::class,'AlterarCarro'])->name('alterar-carro');
Route::put('/editar-carro/{registrosCarros}',[CarroController::class,'AlterarBancoCarro'])->name('alterar-banco-carro');

