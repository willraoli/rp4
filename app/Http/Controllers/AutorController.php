<?php

namespace App\Http\Controllers;

use App\Models\Autor;

class AutorController extends Controller
{
    public function create()
    {
        return view('autor.cadastrar');
    }

    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autor.editar', ['autor' => $autor]);
    }

    public function delete($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autor.deletar', ['autor' => $autor]);
    }

    public function show($id) // repository
    {
        $autor = Autor::findOrFail($id);
        return view('autor.mostrar', ['autor' => $autor]);
    }

    public function show_with_pagination()
    {
        return Autor::paginate(10);
    }

    public function manage()
    {
        $autor = Autor::all();
        return view('autor.gerenciar', ['autor' => $autor]);
    }
}
