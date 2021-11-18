<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/avaliador/create', [App\Http\Controllers\AvaliadorController::class, 'create']);
Route::post('/avaliador/create', [App\Http\Controllers\AvaliadorController::class, 'store'])->name('cadastroAvaliador');
Route::get('/avaliador/ver/{id}', [App\Http\Controllers\AvaliadorController::class, 'show']);
Route::get('/avaliador/editar/{id}', [App\Http\Controllers\AvaliadorController::class, 'edit']);
Route::post('/avaliador/editar/{id}', [App\Http\Controllers\AvaliadorController::class, 'update'])->name('editarAvaliador');
Route::get('/avaliador/excluir/{id}', [App\Http\Controllers\AvaliadorController::class, 'delete']);
Route::post('/avaliador/excluir/{id}', [App\Http\Controllers\AvaliadorController::class, 'destroy'])->name('excluirAvaliador');