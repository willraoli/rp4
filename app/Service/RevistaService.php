<?php

namespace App\Service;

use App\Repository\RevistaRepository;
use Illuminate\Http\Request;

class RevistaService{

    private RevistaRepository $repository;
    
    public function search(Request $request){
        $q = $request->query('q');
        
        echo  $this->queryTitle($q);
    }

    public function queryTitle($title){
        
        if(strlen($title) > 0 ){
            $this->repository = new RevistaRepository;        
            
            $revistas = $this->repository->queryTitle($title);
            $response_html = '';

            foreach($revistas as $revista){
                $response_html = $response_html . '<a type="button" onclick="select('.$revista->id.')" ><li class="list-group-item" id='.$revista->id.'>'.$revista->tituloRevista.'</li></a>';
            }

            return $response_html;
        }

    }

}

?>