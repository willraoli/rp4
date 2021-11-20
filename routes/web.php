<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//controller
Route::get('/autor/cadastro', [App\Http\Controllers\AutorController::class, 'create']);
Route::get('/autor/deletar/{id}', [\App\Http\Controllers\AutorController::class, 'delete']);
Route::get('/autor/editar/{id}', [App\Http\Controllers\AutorController::class, 'edit']);

//repository
Route::post('/autor/editar/{id}', [App\Repository\AutorRepository::class, 'update'])->name('edicao_autor');
Route::get('/autor/{id}', [App\Repository\AutorRepository::class, 'show']);
Route::post('/autor/cadastro', [App\Repository\AutorRepository::class, 'store'])->name('cadastro_autor');
Route::post('/autor/deletar/{id}', [App\Repository\AutorRepository::class, 'destroy'])->name('exclusao_autor');