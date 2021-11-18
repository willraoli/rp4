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

    public function edit($id){

        $avaliador = Avaliador::findOrFail($id);
        return view('avaliador.edit', ['avaliador' => $avaliador]);
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

    public function delete($id){

        $avaliador = Avaliador::findOrFail($id);
        return view('avaliador.delete', ['avaliador' => $avaliador]);
    }

    public function destroy($id){

        $avaliador = Avaliador::findOrFail($id);
        $avaliador->delete();

        return "Avaliador excluído com sucesso!";
    }
}
