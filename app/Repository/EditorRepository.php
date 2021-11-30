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

    public function store(Request $request) // repository
    {
        $dados = request()->validate([
            'nome' => 'required|min:3',
            'email' => 'required|max:250',
            'endereco' => 'required|max:250',
            'telefone' => 'required|min:13|max:13',
            'area_id' => 'nullable',
            'pais_id' => 'nullable',
            'dataContratacao' => 'required',
            'dataDemissao' => 'nullable'
        ]);

        $user = User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $editor = Editor::create([
            'user_id' => $user->id,
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'pais_id' => $request->pais,
            'area_id' => $request->especialidade,
            'dataContratacao' => $request->dataContratacao,
            'dataDemissao' => $request->dataDemissao,
        ]);


        $user->assignRole('editor');
        return $user->save();
    }

    public function update(Request $request) // repository
    {
        $editor = $this->getByID($request->id);
        $user = $this->getByID($request->user_id);

        $dados = request()->validate([
            'nome' => 'required|min:3',
            'email' => 'nullable',
            'endereco' => 'required|max:250',
            'telefone' => 'required|max:250',
            'area_id' => 'nullable',
            'pais_id' => 'nullable',
            'dataContratacao' => 'required',
            'dataDemissao' => 'nullable'
        ]);

        $editor->update([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'pais_id' => $request->pais_id,
            'area_id' => $request->especialidade,
            'dataContratacao' => $request->dataContratacao,
        ]);
        $user->update([
            'name' => $request->nome,
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
