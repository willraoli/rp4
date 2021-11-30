<?php

namespace App\Repository;

use App\Models\Editor;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class EditorRepository
{

    public function show(){
        return Editor::paginate(10);
    }

    public function store(Request $request) // repository
    {
        $editor = Editor::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'pais_id' => $request->pais,
            'area_id'=> $request->especialidade,
            'dataContratacao' => $request->dataContratacao,
            'dataDemissao' => $request->dataDemissao,
        ]);

        return "Editor cadastrado com sucesso!";
    }

    public function update(Request $request) // repository
    {
        $editor = $this->getByID($request->id);

        $editor->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'pais_id' => $request->pais,
            'area_id'=> $request->especialidade,
            'dataContratacao' => $request->dataContratacao,
            'dataDemissao' => $request->dataDemissao,
        ]);

        return "Editor alterado com sucesso!";
    }

    public function destroy($id) // repository
    {
        $editor = Editor::findOrFail($id);
        $editor->delete();

        return "Editor excluído com sucesso!";
    }

    public function getByID($id){
        try{
            $editor = Editor::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return False;
        }
        return $editor;
    }
}
