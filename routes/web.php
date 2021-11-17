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

// CRUD Autor
Route::get('/autor/cadastro', [App\Http\Controllers\AutorController::class, 'create']);
Route::post('/autor/cadastro', [App\Http\Controllers\AutorController::class, 'store'])->name('cadastro_autor');
Route::get('/autor/{id}', [App\Http\Controllers\AutorController::class, 'show']);
Route::get('/autor/editar/{id}', [App\Http\Controllers\AutorController::class, 'edit']);
Route::post('/autor/editar/{id}', [App\Http\Controllers\AutorController::class, 'update'])->name('edicao_autor');
Route::get('/autor/deletar/{id}', [\App\Http\Controllers\AutorController::class, 'delete']);
Route::post('/autor/deletar/{id}', [\App\Http\Controllers\AutorController::class, 'destroy'])->name('exclusao_autor');