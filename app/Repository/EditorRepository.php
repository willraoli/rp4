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
        $editor = new Editor();
        $editor->user_id = $user_id;
        $editor->area_id = $data['area_id'];
        $editor->dataContratacao = $data['dataContratacao'];

        return $editor->save();
    }

    public function update(Request $request) // repository
    {

        $dados = request()->validate([
            'nome' => 'required|min:3',
            'email' => 'nullable',
            'endereco' => 'required|max:250',
            'telefone' => 'required|max:13',
            'area_id' => 'nullable',
            'pais_id' => 'nullable',
            'dataContratacao' => 'required',
        ]);

        $editor = new Editor();
        $editor = Editor::where('id', $request->id)->first();

        $editor->user->name = $request->name;
        $editor->user->email = $request->email;
        $editor->user->endereco = $request->endereco;
        $editor->user->endereco = $request->telefone;
        $editor->area_id = $request->especialidade;
        $editor->dataContratacao = $request->dataContratacao;

        return $editor->push();

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

    public function getEditorByUserID($user_id){
        return Editor::where('user_id', $user_id)->first();
    }
}
