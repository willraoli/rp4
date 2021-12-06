<?php

namespace App\Business\Autor;

use App\Models\Autor;
use App\Repository\AutorRepository;


class AutorBusiness{

    private AutorRepository $repository;

    public function createAutor(array $data, $user_id){

        $orcid = $data['orcid'];

        $this->repository = new AutorRepository();
        $this->repository->store($user_id, $orcid);
    }



}

?>