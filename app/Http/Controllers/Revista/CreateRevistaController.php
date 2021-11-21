<?php

namespace App\Http\Controllers\Revista;

use App\Http\Controllers\Controller;
use App\Business\Revista\RevistaBusiness;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CreateRevistaController extends Controller{
   private RevistaBusiness $business;

public function create(Response $request){
           
    // if(!empty($request->all())){
        $this->business = new RevistaBusiness;
        $request = $this->business->createBusiness($request->status());
    // }else{
        //  return redirect()->route('index');
    // }
 
}


}
?>