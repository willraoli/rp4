<?php

namespace App\Business\Revista;

use App\Models\Revista;
use App\Repository\RevistaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RevistaBusiness{

    private RevistaRepository $repository;

    public function __construct() { }

    public function createRevista(Request $request){
        
        if(!$this->uniqueISSN($request->issn) && !$this->uniqueTitle($request->titulo)){
            $this->repository = new RevistaRepository;
            $saved = $this->repository->create($request);
            
            return $saved;
            
        }else{
            return 'False';
        }

    }

    public function manageRevistas(){
        //verificar se usuário esta autenticado
        //verificar permissões do usuário

        $this->repository = new RevistaRepository;

        return $this->repository->show();
        
    }


    public function deleteRevista(Request $request){
        //verificar quantidade de edições antes de deletar

        $this->repository = new RevistaRepository;
        return $this->repository->delete($request->id);

    }

    public function selectRevista(Request $request){
        
        $this->repository = new RevistaRepository;
        $revista = $this->repository->getByID($request->id);

        return $revista;
    }

    public function updateRevista(Request $request){
        $this->repository = new RevistaRepository;
        return $this->repository->update($request); 
    }

    //Mover pra repository?
    //Retorna true se já existir uma revista com o mesmo nome
    public function uniqueTitle(String $titulo){
        return DB::table('revistas')->where('tituloRevista', $titulo)->exists();
    }

    //Mover pra repository?
    //Retorna true se já existir uma revista com o mesmo ISSN
    private function uniqueISSN(String $issn){
        return DB::table('revistas')->where('ISSNRevista', $issn)->exists();
    }

}

?>