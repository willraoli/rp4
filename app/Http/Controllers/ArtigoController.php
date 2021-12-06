<?php

namespace App\Http\Controllers;

use App\Business\Submissao\SubmissaoBusiness;
use App\Models\Submissao;
use App\Repository\RevistaRepository;
use Illuminate\Http\Request;


class ArtigoController extends Controller{

    private SubmissaoBusiness $bussiness;

    public function submitForm(){
        
        return view('artigo/submeter');
    }


    public function submissoes(){
        // $submissoes = Submissao::paginate(10);

        // return view('artigo/submissoes', compact('submissoes'));

        $this->bussiness = new SubmissaoBusiness;   
        $submissoes = $this->bussiness->manageSubmissao();
        return view('artigo/submissoes', compact('submissoes'));

    }
 

   public function submit(Request $request){
        $this->bussiness = new SubmissaoBusiness;      
        $valido = True;

        if(!empty($request->autor_id)){
            // Valida os arquivos
            foreach($request->artigo as $artigo){
                if(!$this->bussiness->validateFile($artigo)){
                    $valido = False;
                }
            }
            
            if($valido){
                $this->bussiness->createSubmissao($request);
                return redirect()->route('minhas.submissoes');   
            }else{
                return redirect()->route('submit.artigo.view')->with('erro001', "Erro ao submeter o artigo!");
            }
        }else
            return redirect()->route('submit.artigo.view')->with('erro002', "Nenhum Autor Informado, selecione pelo menos um autor.");

   }


}

?>