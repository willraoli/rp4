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
    public function store(Request $request)
    {

        $data = request()->validate([
            'nome' => 'required|max:50|min:3',
            'email' => 'required|max:250',
            'endereco' => 'required|max:250',
            'telefone' => 'required|min:13|max:13',
            'area_pref' => 'required',
            'pais_origem' => 'required'
        ]);

        $user = User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $avaliador = Avaliador::create([
            'user_id' => $user->id,
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'area_pref' => $request->area_pref,
            'pais_origem' => $request->pais_origem,
        ]);




        $user->assignRole('avaliador');
        $user->save();

        return $avaliador->save();
    }

    public function getByID($id)
    {
        try {
            $avaliador = Avaliador::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return False;
        }
        return $avaliador;
    }

    public function show()
    {
        return Avaliador::paginate(10);
    }

    public function update(Request $request)
    {
        $avaliador = $this->getByID($request->id);
        $user = User::findOrFail($avaliador->user_id);

        $data = request()->validate([
            'nome' => 'required|max:50|min:3',
            'email' => 'nullable',
            'endereco' => 'required|max:250',
            'telefone' => 'required|min:13|max:13',
            'area_pref' => 'required',
            'pais_origem' => 'required'
        ]);

        $user->update([
            'name' => $request->nome,
        ]);

        $avaliador->update([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'area_pref' => $request->area_pref,
            'pais_origem' => $request->pais_origem
        ]);
    }

    public function destroy($id)
    {
        $avaliador = Avaliador::findOrFail($id);
        $user = User::findOrFail($avaliador->user_id);
        $avaliador->delete();
        return $user->delete();
    }
}
