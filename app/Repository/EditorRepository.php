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

        dd('teste');
        
        $data = request()->validate([
            'nome' => 'required|min:3|max:250',
            'email' => 'required|max:250',
            'endereco' => 'required|max:250',
            'telefone' => 'required|min:13|max:13',
            'area_id' => 'required',
            'pais_id' => 'required',
            'dataContratacao' => 'required',
            'dataDemissao' => 'nullable',
        ]);

        $editor = Editor::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'pais_id' => $request->pais,
            'area_id' => $request->especialidade,
            'dataContratacao' => $request->dataContratacao,
            'dataDemissao' => $request->dataDemissao,
        ]);

        $user = User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('editor');
        $user->save();
    }

    public function update(Request $request) // repository
    {
        $editor = $this->getByID($request->id);
        $user = User::findOrFail($request->id);

        $data = request()->validate([
            'nome' => 'required|max:50|min;3',
            'email' => 'required|max:250',
            'endereco' => 'required|max:250',
            'telefone' => 'required|min:13|max:13',
            'area_id' => 'required',
            'pais_id' => 'required',
            'dataContratacao' => 'required',
            'dataDemissao' => 'required',

        ]);

        $editor->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'pais_id' => $request->pais,
            'area_id' => $request->especialidade,
            'dataContratacao' => $request->dataContratacao,
            'dataDemissao' => $request->dataDemissao,
        ]);

        $user->update([
            'name' => $request->nome,
            'email' => $request->email,
        ]);
    }

    public function destroy($id) // repository
    {
        $editor = Editor::findOrFail($id);
        $editor->delete();

        return "Editor excluído com sucesso!";
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
