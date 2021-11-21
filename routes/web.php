<?php

use Illuminate\Support\Facades\Auth;
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

// Editor
Route::get('/editor/novo', [App\Http\Controllers\EditoresController::class, 'create']);
Route::get('/editor/visualizar/{id}', [App\Http\Controllers\EditoresController::class, 'show']);
Route::get('/editor/editar/{id}', [App\Http\Controllers\EditoresController::class, 'edit']);
Route::get('/editor/excluir/{id}', [App\Http\Controllers\EditoresController::class, 'delete']);


Route::post('/editor/novo', [App\Http\Controllers\EditoresController::class, 'store'])->name('registrar_editor');
Route::post('/editor/editar/{id}', [App\Http\Controllers\EditoresController::class, 'update'])->name('alterar_editor');
Route::post('/editor/excluir/{id}', [App\Http\Controllers\EditoresController::class, 'destroy'])->name('excluir_editor');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
