<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Models\Autor;
use App\Models\User;

class AutorRepository
{
    // public function store(Request $request) // repository
    // {
    //     Autor::create([
    //         'nome' => $request->nome,
    //         'email' => $request->email,
    //         'endereco' => $request->endereco,
    //         'telefone' => $request->telefone,
    //     ]);

    //     return "Autor cadastrado com sucesso!";
    // }

    public function store($user_id, $orcid) // repository
    {
        $autor = new Autor();
        $autor->user_id = $user_id;
        $autor->orcid = $orcid;
        return $autor->save();
    }


    public function update(Request $request, $id) // repository
    {
        $autor = Autor::findOrFail($id);

        $autor->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
        ]);

        return "Autor editado com sucesso!";
    }

    public function destroy($id) // repository
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();

        return "Autor excluído com sucesso!";
    }

    public function getAutorByUserID($user_id){
        return Autor::where('user_id', $user_id)->first();
    }
}
