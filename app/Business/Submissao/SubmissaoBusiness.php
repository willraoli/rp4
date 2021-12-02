<?php

namespace App\Business\Submissao;

use App\Repository\SubmissaoRepository;
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
        $this->repository->create($request, $caminhosArtigos);
    }

}

?>