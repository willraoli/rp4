<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliador;

class AvaliadorController extends Controller
{
    public function create(){
        return view('avaliador.create');
    }

    public function store(Request $request){
        
        Avaliador::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
        ]);

        return "Avaliador cadastrado com sucesso!";
    }

    public function show($id){

        $avaliador = Avaliador::findOrFail($id);
        return view('avaliador.show', ['avaliador' => $avaliador]);
    }
}
