<?php

namespace App\Service;

use App\Repository\AutorRepository;
use Illuminate\Http\Request;

class AutorService{

    private AutorRepository $repository;
    
    public function search(Request $request){
        $q = $request->query('q');       
        echo  $this->queryTitle($q);
    }

    public function queryTitle($title){
        
        if(strlen($title) > 0 ){
            $this->repository = new AutorRepository;        
            
            $autores = $this->repository->queryTitle($title);
            $response_html = '';

            foreach($autores as $autor){
                $response_html = $response_html . '<a type="button" onclick="selectAuthor('.$autor->id.')" ><li class="list-group-item" id='.$autor->id.'>'.$autor->nome.'</li></a>';
            }

            return $response_html;
        }


    }

}


?>