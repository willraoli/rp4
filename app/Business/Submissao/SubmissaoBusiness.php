<?php

namespace App\Business\Submissao;

use App\Models\Revista;
use App\Models\Submissao;
use App\Repository\AutorRepository;
use App\Repository\SubmissaoRepository;
use ArtigoFinal;
use Illuminate\Http\Request;

class SubmissaoBusiness{

    private SubmissaoRepository $repository;
    const LIMITE = 52428800; // quantidade de bytes equivantes a 50MB 
    const FORMATOS_ACEITOS = ['pdf']; //Novos formatos adicionar aqui


    public function validateFile($file){
        if($file->isValid() && $file->getSize() < self::LIMITE){
            $extension = $file->getClientOriginalExtension();
            foreach(self::FORMATOS_ACEITOS as $format){
                if($format == $extension)
                    return True;    
            }
        }
        return False;
    }

    public function createSubmissao(Request $request){
        
        $caminhosArtigos = [];

        foreach($request->artigo as $artigo){
            $name = uniqid(date('HisYmd'));
            $extension = $artigo->extension();    
            $nameFile = "{$name}.{$extension}";      
            $upload = $artigo->storeAS('public/artigos', $nameFile);

            $caminhosArtigos[] = 'artigos/' . $nameFile;
        }
             
        $this->repository = new SubmissaoRepository();
        $current_user_id = auth()->user()->id;
        $autor_repository = new AutorRepository();
        $autor = $autor_repository->getAutorByUserID($current_user_id);        
        
        $this->repository->create($request, $caminhosArtigos, $autor);
    }

    public function manageSubmissao(){

        $current_user_id = auth()->user()->id;
        
        $autor_repository = new AutorRepository();
        $autor = $autor_repository->getAutorByUserID($current_user_id);

        $submissao_repository = new SubmissaoRepository();
        $submissao = $submissao_repository->showMySubmissions($autor->orcid);

        return $submissao;   
    }


    public function validateStatus($id){
        $this->repository = new SubmissaoRepository();
        $artigos = $this->repository->getArtigosBySubmissionID($id);
        foreach($artigos as $artigo){
            if($artigo->situacao_id != 4)
                return False;
        }
        return True;
    }

}

?>