<?php 
namespace App\Repository;

use App\Models\Revista;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class RevistaRepository{
   
    public function create(Request $request){
       
        $revista = Revista::create([
            'editor_id' => $request->editor_id,
            'area_id' => $request->areas,
            'tituloRevista' => $request->titulo,
            'limiteArtigo' => $request->limite,
            'ISSNRevista' => $request->issn,
            'periodicidade_id' => $request->periodicidade,
        ]);

        return $revista->save();
    }

   
    public function show(){
        return Revista::paginate(10);
    }

    public function queryTitle(String $title){
        return Revista::where('tituloRevista', 'LIKE', '%'.$title.'%')->get();
    }

    public function getByID($id){
        
        try{
            $revista = Revista::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return False;
        }

        return $revista;
       
    }

    public function update(Request $request){
        $revista = $this->getByID($request->id);

        if(!empty($revista) && $revista != False){
            $revista->update([
                'editor_id' => $request->editor_id,
                'area_id' => $request->areas,
                'tituloRevista' => $request->titulo,
                'limiteArtigo' => $request->limite,
                'ISSNRevista' => $request->issn,
                'periodicidade' => $request->periodicidade,
            ]);
        }
        
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