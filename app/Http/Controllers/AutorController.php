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
}
