<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorRepository
{
    public function store(Request $request) // repository
    {
        Autor::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
        ]);

        return "Autor cadastrado com sucesso!";
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
}
