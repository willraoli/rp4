<?php

namespace App\Repository;

use App\Models\User;
use App\Models\Editor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class EditorRepository
{

    public function show()
    {
        return Editor::paginate(10);
    }

    public function store(array $data, $user_id) // repository
    {
        $dados = request()->validate([
            'area_id' => 'nullable',
            'dataContratacao' => 'required',
            'dataDemissao' => 'nullable'
        ]);

        $editor = Editor::create([
            'user_id' => $user_id,
            'area_id' => $data['especialidade'],
            'dataContratacao' => $data['dataContratacao'],
        ]);
             
        return $editor->save();
    }

    public function update(Request $request) // repository
    {
        $editor = $this->getByID($request->id);
        $user = User::findOrFail($editor->user_id);

        $dados = request()->validate([
            'nome' => 'required|min:3',
            'email' => 'nullable',
            'endereco' => 'required|max:250',
            'telefone' => 'required|max:13',
            'area_id' => 'nullable',
            'pais_id' => 'nullable',
            'dataContratacao' => 'required',
            'dataDemissao' => 'nullable'
        ]);

        $user->update([
            'name' => $request->nome,
        ]);

        $editor->update([
            'user_id' => $user->id,
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'pais_id' => $request->pais_id,
            'area_id' => $request->especialidade,
            'dataContratacao' => $request->dataContratacao,
        ]);
    }

    public function destroy($id) // repository
    {
        $editor = Editor::findOrFail($id);
        $user = User::findOrFail($editor->user_id);
        $editor->delete();

        return $user->delete();
    }

    public function getByID($id)
    {
        try {
            $editor = Editor::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return False;
        }
        return $editor;
    }
}
