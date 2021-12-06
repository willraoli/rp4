<?php 
namespace App\Repository;

use App\Models\ArtigoFinal;
use App\Models\Autor;
use App\Models\Revista;
use App\Models\Submissao;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmissaoRepository{
   
    public function create(Request $request, $caminhoArtigos, $autor){
        
        try{
            $submissao = new Submissao();
            Revista::findOrFail($request->revista_id);
            $submissao->revista_id = $request->revista_id;
            $submissao->autor_id = $autor->orcid;
            $submissao->finalizado = False;
            $submissao->save();
            
            $i = 0;
            foreach($request->artigo as $art){
                $artigo    = new ArtigoFinal();
                $artigo->tituloArtigo = $request->tituloArtigo[$i];
                $artigo->caminhoArtigo = $caminhoArtigos[$i];   
                $artigo->situacao_id = 3; //Sob Avaliação
                $artigo->save();

                $autores = $request->autor_id ;
                foreach($autores as $id){
                    $artigo->autores()->attach($id);
                }
                
                $submissao->artigos()->attach($artigo->getKey());
                $i = $i + 1;
            }
            DB::commit();
            return True;

        }catch(\Exception $e){
            DB::rollBack();
            return False;
        }


    }

    public function showMySubmissions($autor){

        return Submissao::where('autor_id', $autor)->paginate(10);
    }

}

?>