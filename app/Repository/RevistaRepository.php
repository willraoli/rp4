<?php 
namespace App\Repository;

use App\Models\Editor;
use App\Models\Revista;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RevistaRepository{
   
    public function create(Request $request){
       
        $revista = Revista::create([
            'editor_id' => $request->editor,
            'area_id' => $request->areas,
            'tituloRevista' => $request->titulo,
            'limiteArtigo' => $request->limite,
            'ISSNRevista' => $request->issn,
            'periodicidade' => $request->periodicidade,
        ]);

        return $revista->save();
    }

    public function update(){}

    public function show(){
        return Revista::all();
    }

    public function delete($id){
        
        try{
            $revista = Revista::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return False;
        }

        return $revista->delete();
    }
}

?>