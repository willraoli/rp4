<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Models\Editor;

class EditorRepository
{
    public function store(Request $request) // repository
    {
        Editor::create([
            'nome' => $request->nome,
            'dataContratacao' => $request->email,
            'dataDemissao' => $request->endereco,
        ]);

        return "Editor cadastrado com sucesso!";
    }

    public function update(Request $request, $id) // repository
    {
        $editor = Editor::findOrFail($id);

        $editor->update([
            'nome' => $request->nome,
            'dataContratacao' => $request->email,
            'dataDemissao' => $request->endereco,
        ]);

        return "Editor editado com sucesso!";
    }

    public function destroy($id) // repository
    {
        $editor = Editor::findOrFail($id);
        $editor->delete();

        return "Editor excluído com sucesso!";
    }
}
