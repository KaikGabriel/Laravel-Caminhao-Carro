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



Route::get('/',[HomeController::class,'MostrarHome'])->name('home');
Route::get('/editar-caminhao',[CaminhaoController::class,'Editar'])->name('editar-caminhao');
Route::get('/cadastrar-caminhao',[CaminhaoController::class,'FormularioCadastro'])->name('cadastrar-caminhao');
route::post('/cadastrar-caminhao', [CaminhaoController::class, 'SalvarBanco'])->name('salvar-banco');


/* CARROS */
Route::get('/editar-carro',[CarroController::class,'EditarCarro'])->name('editar-carro');
Route::get('/cadastrar-carro',[CarroController::class,'FormularioCadastroCarro'])->name('cadastrar-carro');
route::post('/cadastrar-carro', [CarroController::class, 'SalvarBancoCarro'])->name('salvar-banco-carro');


