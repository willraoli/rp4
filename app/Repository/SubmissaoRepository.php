<?php 
namespace App\Repository;

use App\Models\ArtigoFinal;
use App\Models\Autor;
use App\Models\Revista;
use App\Models\Submissao;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SubmissaoRepository{
   
    public function create(Request $request, $caminhoArtigos){
    
        $submissao = new Submissao();
        
        
        try{
            Revista::findOrFail($request->revista_id);
        }catch(ModelNotFoundException $e){
            return False;
        }

        $submissao->revista_id = $request->revista_id;
        $submissao->save();
        
        $i = 0;
        foreach($request->artigo as $art){
            $artigo    = new ArtigoFinal();
            $artigo->tituloArtigo = $request->tituloArtigo[$i];
            $artigo->caminhoArtigo = $caminhoArtigos[$i];   
            $artigo->save();

            $autores = $request->autor_id ;
            foreach($autores as $id){
                $artigo->autores()->attach($id);
            }
            
            $submissao->artigos()->attach($artigo->getKey());
            $i = $i + 1;
        }
       
    }

    public function showMySubmissions($user_id){
        

    }

}

?>