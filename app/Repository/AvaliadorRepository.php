<?php

namespace App\Repository;

use Illuminate\Http\Request;
//use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Avaliador;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
//use Illuminate\Support\Facades\Validator;

class AvaliadorRepository
{
    public function store(Request $request){
        // $v = Validator::make($request->all(), [
        //     'nome' => 'required|max:255',
        //     'email' => 'required|max:255',
        //     'endereco' => 'required|max:255',
        //     'telefone' => 'required|min:11',
        // ]);

        // if($v->fails()){
        //     return $v === True ? redirect()->route('home',) : redirect()->route('create.avaliador.view', 'err');
        // }
        $data = request()->validate([
        'nome' => 'required|max:50|min:3',
        'email' => 'required|max:250',
        'endereco' => 'required|max:250',
        'telefone' => 'required|min:13|max:13',
        'area_pref' => 'required',
        'pais_origem' => 'required'
        ]);

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