<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliador;

class AvaliadorController extends Controller
{
    public function store(Request $request){
        
        Avaliador::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
        ]);

        return "Avaliador cadastrado com sucesso!";
    }

    public function update(Request $request, $id){

        $avaliador = Avaliador::findOrFail($id);

        $avaliador->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
        ]);

        return "Informações do Avaliador atualizadas com sucesso!";
    }

    public function destroy($id){

        $avaliador = Avaliador::findOrFail($id);
        $avaliador->delete();

        return "Avaliador excluído com sucesso!";
    }
}