<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

// default
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/pop', [App\Http\Controllers\Utils\PopulateTables::class, 'index'])->name('popular.tabelas');

// Revista
Route::get('/form/create/revista', [App\Http\Controllers\RevistaController::class, 'createForm'])->name('create.revista.view');
Route::post('/create/revista', [App\Http\Controllers\RevistaController::class, 'create'])->name('create.revista');
Route::get('/manage/revistas', [App\Http\Controllers\RevistaController::class, 'manage'])->name('list.revista.mgmt');
Route::post('/revista/editar/{id}', [App\Http\Controllers\RevistaController::class, 'update'])->name('update.revista');
Route::get('/revista/excluir/{id}', [App\Http\Controllers\RevistaController::class, 'delete'])->name('delete.revista');
Route::get('/select/revista/{id}', [App\Http\Controllers\RevistaController::class, 'select'])->name('select.revista');

//Artigo
Route::get('/form/submit/artigo', [App\Http\Controllers\ArtigoController::class, 'submitForm'])->name('submit.artigo.view');
Route::post('/submit/artigo', [App\Http\Controllers\ArtigoController::class, 'submit'])->name('submit.artigo');
Route::get('/my/submissions', [App\Http\Controllers\ArtigoController::class, 'submissoes'])->name('minhas.submissoes');
Route::get('/search', [App\Service\RevistaService::class, 'search'])->name('search.revista');
Route::get('/search/autor', [App\Service\AutorService::class, 'search'])->name('search.autor');
Route::get('/help', function (){
    return Storage::get("storage/artigos/2121432021113061a695e7b8ef0.pdf");
})->name('a');

// avaliador - TODO: talvez trocar o prefixo das rotas para deixar uniforme
Route::get('/form/create/avaliador', function () {
    return view('avaliador\create');
})->name('create.avaliador.view');
Route::post('/create/avaliador', [App\Http\Controllers\AvaliadorController::class, 'create'])->name('create.avaliador');

// avaliador - bonitinho mas faltando trocar as rotas acima
Route::group(['prefix' => 'avaliador'], function () {
    Route::get('/ver/{id}', [App\Http\Controllers\AvaliadorController::class, 'show']);
    Route::get('/editar/{id}', [App\Http\Controllers\AvaliadorController::class, 'edit'])->name('editarAvaliador');
    Route::get('/excluir/{id}', [App\Http\Controllers\AvaliadorController::class, 'delete'])->name('excluirAvaliador');
    Route::get('/manage', [App\Http\Controllers\AvaliadorController::class, 'manage'])->name('listaAvaliadores');
    Route::patch('/editar/{id}', [App\Http\Controllers\AvaliadorController::class, 'update'])->name('editarAvaliador');
    Route::delete('/excluir/{id}', [App\Repository\AvaliadorRepository::class, 'destroy'])->name('deletarAvaliador');
});

// autor
Route::group(['prefix' => 'autor'], function () {
    Route::view('/cadastro', 'autor.cadastrar')->name('create.autor.view');
    Route::post('/cadastro', [App\Http\Controllers\Autor\AutorController::class, 'create'])->name('cadastro_autor');
    Route::get('/editar/{id}', [App\Http\Controllers\Autor\AutorController::class, 'edit'])->name('edicao_autor');
    Route::patch('/editar/{id}', [App\Repository\AutorRepository::class, 'update'])->name('edit.autor');
    Route::get('/deletar/{id}', [\App\Http\Controllers\Autor\AutorController::class, 'delete'])->name('exclusao_autor_modal');
    Route::delete('/deletar/{id}', [App\Repository\AutorRepository::class, 'destroy'])->name('exclusao_autor');
    Route::get('/all', [App\Http\Controllers\Autor\AutorController::class, 'manage'])->name('list.autor.mgmt');
});

// editor
Route::group(['prefix' => 'editor'], function () {
    Route::view('/novo', 'editores.cadastro')->name('create.editor.view');
    Route::post('/novo', [App\Http\Controllers\EditoresController::class, 'create'])->name('registrar_editor');
    Route::get('/visualizar/{id}', [App\Http\Controllers\EditoresController::class, 'show']);
    Route::get('/editar/{id}', [App\Http\Controllers\EditoresController::class, 'edit'])->name('alterar_editor');
    Route::get('/excluir/{id}', [App\Http\Controllers\EditoresController::class, 'delete']);
    Route::get('/manage', [App\Http\Controllers\EditoresController::class, 'manage'])->name('lista_editores');
    Route::patch('/editar/{id}', [App\Http\Controllers\EditoresController::class, 'update'])->name('alterar_editor');
    Route::delete('/excluir/{id}', [App\Repository\EditorRepository::class, 'destroy'])->name('excluir_editor');
});



/* 
    exemplo de como poderia ser qdo todas as rotas forem trocadas

    elas iam ficar separadas por funções do crud, facilitando a leitura

    exemplo 1: localhost:8000/create/autor
    exemplo 2: localhost:8000/create/editor
    exemplo 3: localhost:8000/manage/autor
    exemplo 4: localhost:8000/manage/editor


*/

Route::group(['prefix' => 'create'], function () {
    Route::view('/autor', 'autor.cadastrar')->name('create.autor.view');
    Route::view('/editor', 'editores.cadastro')->name('create.editor.view');
    Route::post('/autor', [App\Http\Controllers\Autor\AutorController::class, 'create'])->name('cadastro_autor');
    Route::post('/editor', [App\Http\Controllers\EditoresController::class, 'create'])->name('registrar_editor');
});

Route::group(['prefix' => 'manage'], function () {
    Route::get('/autor', [App\Http\Controllers\Autor\AutorController::class, 'manage'])->name('list.autor.mgmt');
    Route::get('/editor', [App\Http\Controllers\EditoresController::class, 'manage'])->name('lista_editores');
});

Route::group(['prefix' => 'edit'], function () {
    Route::get('/autor/{id}', [App\Http\Controllers\Autor\AutorController::class, 'edit'])->name('edicao_autor');
    Route::patch('/autor/{id}', [App\Repository\AutorRepository::class, 'update'])->name('edit.autor');
    Route::get('/editor/{id}', [App\Http\Controllers\EditoresController::class, 'edit'])->name('alterar_editor');
    Route::patch('/editor/{id}', [App\Http\Controllers\EditoresController::class, 'update'])->name('alterar_editor');
});

Route::group(['prefix' => 'delete'], function () {
    Route::get('/autor/{id}', [\App\Http\Controllers\Autor\AutorController::class, 'delete'])->name('exclusao_autor_modal');
    Route::delete('/autor/{id}', [App\Repository\AutorRepository::class, 'destroy'])->name('exclusao_autor');
    Route::get('/editor/{id}', [App\Http\Controllers\EditoresController::class, 'delete']);
    Route::delete('/editor/{id}', [App\Repository\EditorRepository::class, 'destroy'])->name('excluir_editor');
});