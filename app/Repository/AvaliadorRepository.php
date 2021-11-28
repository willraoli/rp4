<?php

namespace App\Repository;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Avaliador;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AvaliadorRepository
{
    public function store(Request $request){
        
        $avaliador = Avaliador::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'area_pref' => $request->area_pref,
            'pais_origem' => $request->pais_origem,
        ]);

        $user = User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('avaliador');
        $user->save();
        
        return $avaliador->save();
    }

    public function getByID($id){
        try{
            $avaliador = Avaliador::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return False;
        }
        return $avaliador;
    }

    public function show(){
        return Avaliador::paginate(10);
    }

    public function update(Request $request){

        $avaliador = $this->getByID($request->id);

        $avaliador->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
        ]);
    }

    public function destroy($id){
        $avaliador = Avaliador::findOrFail($id);
        return $avaliador->delete();

    }
} 