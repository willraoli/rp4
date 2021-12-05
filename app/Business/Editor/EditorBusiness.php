<?php
namespace App\Business\Editor;

use App\Models\Editor;
use App\Repository\EditorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditorBusiness{

    private EditorRepository $repository;

    public function __construct(){}

    // if(!$this->uniqueEmail($request->email)){
    // $this->repository= new EditorRepository;
    // $saved = $this->repository->store($request);

    // return $saved;

    // }else{
    //     return 'False';
    // }

    public function createEditor(Request $request){


        if(!$this->uniqueEmailUser($request->email)){
            $this->repository= new EditorRepository;
            $saved = $this->repository->store($request);

            return $saved;

        }else{
            return 'False';
        }

    }
    public function manageEditor(){

        $this->repository = new EditorRepository;

        return $this->repository->show();
    }

    public function deleteEditor(Request $request){

        $this->repository = new EditorRepository;
        return $this->repository->destroy($request->id, $request->user_id);
    }

    public function selectEditor(Request $request){

        $this->repository = new EditorRepository;
        $editor = $this->repository->getByID($request->id);

        return $editor;
    }

    public function updateEditor(Request $request){
        $this->repository = new EditorRepository;
        return $this->repository->update($request);
    }

    public function uniqueEmail(String $email){
        return DB::table('editors')->where('email', $email)->exists();
    }

    public function uniqueEmailUser(String $email){
        return DB::table('users')->where('email', $email)->exists();
    }

    public function getPaisById($id)
    {
        $pais = DB::table('paises')->where('pais_id', $id)->first();
        return $pais->nomePais;
    }

    public function getAllCountries(){
        $dataCountries = DB::table('paises')->get();
        return $dataCountries;
    }

    public function getAllAreas(){
        $dataAreas = DB::table('areas')->get();
        return $dataAreas;
    }
}
?>
