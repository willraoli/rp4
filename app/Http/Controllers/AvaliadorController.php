<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliador;

class AvaliadorController extends Controller
{
    public function create(){
        return view('avaliador.create');
    }

    public function show($id){

        $avaliador = Avaliador::findOrFail($id);
        return view('avaliador.show', ['avaliador' => $avaliador]);
    }

    public function edit($id){

        $avaliador = Avaliador::findOrFail($id);
        return view('avaliador.edit', ['avaliador' => $avaliador]);
    }

    public function delete($id){

        $avaliador = Avaliador::findOrFail($id);
        return view('avaliador.delete', ['avaliador' => $avaliador]);
    }

    
}
