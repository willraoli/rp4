<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    public function create()
    {
        return view('autor.cadastrar');
    }

    public function store(Request $request)
    {
        Autor::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
        ]);

        return "Autor cadastrado com sucesso!";
    }

    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autor.mostrar', ['autor' => $autor]);
    }

    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autor.editar', ['autor' => $autor]);
    }

    public function update(Request $request, $id)
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

    public function delete($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autor.deletar', ['autor' => $autor]);
    }

    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();

        return "Autor excluído com sucesso!";
    }
}
