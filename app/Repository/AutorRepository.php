<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Models\Autor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AutorRepository
{
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:50|min:3',
            'email' => 'required|max:250',
            'endereco' => 'required|max:250',
            'telefone' => 'required|min:13|max:13',
            'area_pref' => 'required',
            'instituicao' => 'nullable',
            'pais_origem' => 'nullable'
            ]);

        $autor = Autor::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'area_pref' => $request->area_pref,
            'instituicao' => $request->instituicao,
            'pais_origem' => $request->pais_origem,
        ]);

        $user = User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('autor');
        $user->save();

        return $autor->save();
    }

    public function getByID($id){
        try{
            $autor = Autor::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return False;
        }
        return $autor;
    }

    public function update(Request $request)
    {
        $autor = $this->getByID($request->id);
        $user = User::findOrFail($request->id);

        $request->validate([
            'nome' => 'required|max:50|min:3',
            'email' => 'required|max:250',
            'endereco' => 'required|max:250',
            'telefone' => 'required|min:13|max:13',
            'area_pref' => 'required',
            'instituicao' => 'nullable',
            'pais_origem' => 'required'
            ]);

        $autor->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'area_pref' => $request->area_pref,
            'pais_origem' => $request->pais_origem,
            'instituicao' => $request->instituicao,
        ]);

        $user->update([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return $autor;
    }

    public function destroy($id) {
        $autor = Autor::findOrFail($id);
        $user = User::findOrFail($id);
        $user->delete();
        return $autor->delete();

    }

    public function show(){
        return Autor::paginate(10);
    }

    public function queryTitle(String $title){
        return Autor::where('nome', 'LIKE', '%'.$title.'%')->get();
    }
}
