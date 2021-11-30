<?php
namespace App\Business\Editor;

use App\Models\Editor;
use App\Repository\EditorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditorBusiness{

    private EditorRepository $repository;

    public function __construct(){}

    public function createEditor(Request $request){
        if(!$this->uniqueEmail($request->email)){
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
}
?>
