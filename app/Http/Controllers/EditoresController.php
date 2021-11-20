<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editor;

class EditoresController extends Controller
{
    public function create()
    {
        return view('editores.cadastro');
    }

    public function store(Request $request)
    {
        Editor::create([
            'nome' => $request->nome,
            'dataContratacao' => $request->dataContratacao,
            'dataDemissao' => $request->dataDemissao,
        ]);
        return "Editor cadastrado com sucesso!";
    }

    public function show($id){
        $editor = Editor::findOrFail($id);
        return view ('editores.show', ['editor' => $editor]);
    }

    public function edit($id){
        $editor = Editor::findOrFail($id);
        return view('editores.edit', ['editor' => $editor]);
    }

    public function update(Request $request, $id){
        $editor = Editor::findOrFail($id);

        $editor->update([
            'nome' => $request->nome,
            'dataContratacao' => $request->dataContratacao,
            'dataDemissao' => $request->dataDemissao,
        ]);
        return "Editor atualizado com sucesso!";
    }
    public function delete($id){
        $editor = Editor::findOrFail($id);
        return view('editores.delete', ['editor' => $editor]);
    }

    public function destroy($id){

    $editor = Editor::findOrFail($id);
    $editor-> delete();

    return "Editor excluído com sucesso";
}
}
