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


Route::get('/', function () {return view('welcome');})->name('index');


Route::get('/pop', [App\Http\Controllers\Utils\PopulateTables::class, 'index'])->name('popular.tabelas');

// Revista
Route::get('/form/create/revista', function() {return view('revista\create');})->name('create.revista.view');
Route::post('/create/revista', [App\Http\Controllers\Revista\RevistaController::class, 'create'])->name('create.revista');
Route::get('/manage/revistas', [App\Http\Controllers\Revista\RevistaController::class, 'manage'])->name('list.revista.mgmt');
Route::post('/revista/editar/{id}', [App\Http\Controllers\Revista\RevistaController::class, 'update'])->name('update.revista');
Route::get('/revista/excluir/{id}', [App\Http\Controllers\Revista\RevistaController::class, 'delete'])->name('delete.revista');
Route::get('/select/revista/{id}', [App\Http\Controllers\Revista\RevistaController::class, 'select'])->name('select.revista');

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

//CRUD Avaliador

//controller
Route::get('/avaliador/create', [App\Http\Controllers\AvaliadorController::class, 'create']);
Route::get('/avaliador/ver/{id}', [App\Http\Controllers\AvaliadorController::class, 'show']);
Route::get('/avaliador/editar/{id}', [App\Http\Controllers\AvaliadorController::class, 'edit']);
Route::get('/avaliador/excluir/{id}', [App\Http\Controllers\AvaliadorController::class, 'delete']);
//repository
Route::post('/avaliador/editar/{id}', [App\Repository\AvaliadorRepository::class, 'update'])->name('editarAvaliador');
Route::post('/avaliador/excluir/{id}', [App\Repository\AvaliadorRepository::class, 'destroy'])->name('excluirAvaliador');
Route::post('/avaliador/create', [App\Repository\AvaliadorRepository::class, 'store'])->name('cadastroAvaliador');


// CRUD Autor

//controller
Route::get('/autor/cadastro', [App\Http\Controllers\AutorController::class, 'create']);
Route::get('/autor/deletar/{id}', [\App\Http\Controllers\AutorController::class, 'delete']);
Route::get('/autor/editar/{id}', [App\Http\Controllers\AutorController::class, 'edit']);
Route::get('/autor/{id}', [App\Http\Controllers\AutorController::class, 'show']);
//repository
Route::post('/autor/editar/{id}', [App\Repository\AutorRepository::class, 'update'])->name('edicao_autor');
Route::post('/autor/cadastro', [App\Repository\AutorRepository::class, 'store'])->name('cadastro_autor');
Route::post('/autor/deletar/{id}', [App\Repository\AutorRepository::class, 'destroy'])->name('exclusao_autor');

//TESTE
