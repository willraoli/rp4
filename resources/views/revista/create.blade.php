<?php 
    use Illuminate\Support\Facades\DB;
?>

@extends('layouts.app')

@section('content')
<div class="container pt-5" >
    <div  class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <form class="form" action="{{ route('create.revista')}}" method="POST">
                    @csrf
                    <h3 class="text-center">Cadastro de Nova Revista</h3>
                    <?php 
                        if(isset($_GET['err'])){
                            echo '<h6 class="text-center" id="obrigatorio"><small>Erro ao cadastrar nova revista!</small></h6>';
                        }
                    ?>
                    <div class="form-group mb-2">
                        <label for="titulo" class="ms-3" m>Título<span id="obrigatorio">*</span></label><br>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="editor" class="ms-3">Editor<span id="obrigatorio">*</span></label><br>
                        <select class="form-control" name="editor" id="editor" required>
                            <option value="...">-</option>
                            <?php
                                  
                                $editor = DB::table('editors')->orderBy('id')->chunk(5, function($editors){
   
                                if(!empty($editor))
                                   echo '<option value="...">-</option>';
         
                                   
                                foreach($editors as $editor){
                                    echo '<option value='.$editor->id.'>'.$editor->nome.'</option>';
                                }  
                                });


                            ?>
                        </select>

                    </div>
                    <div class="form-group mb-2">
                        <label for="issn" class="ms-3">ISSN<span id="obrigatorio">*</span></label><br>
                        <input type="text" name="issn" id="issn" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="limite" class="ms-3">Limite de Artigos<span id="obrigatorio">*</span></label><br>
                        <input type="text" name="limite" id="limite" class="form-control" required>
                    </div>

                    <div class="d-flex">
                        <div class="form-group mb-2 col-5 me-5">
                            <label for="periodicidade" class="ms-3">Periodicidade<span id="obrigatorio">*</span></label><br>
                            <select class="form-control" name="periodicidade" id="periodicidade">
                                <option>Diária</option>
                                <option>Semanal</option>
                                <option>Bissemanal</option>
                                <option>Quinzenal</option>
                                <option>Mensal</option>
                                <option>Bimensal</option>
                                <option>Bimestral</option>
                                <option>Trimestral</option>
                                <option>Quadrimestral</option>
                                <option>Semestral</option>
                                <option>Anual</option>
                                <option>Quinquenal</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-2 col-6 ">
                        <label for="areas" class="ms-3">Áreas</label><br>
                        
                        <select class="form-control" name="areas" id="areas">
                            <?php
                                  
                                  $areas = DB::table('areas')->get();
                                
                                  if(!empty($areas))
                                      echo '<option value="...">-</option>';
                                  

                                  foreach($areas as $area){
                                      echo '<option value='.$area->id.'>'.$area->descricaoArea.'</option>';
                                  }
                                    
                            ?>
                        </select>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-3 form-group pt-2">
                            <input type="submit" name="submit" class="btn btn-success btn-md" style="color:white;" value="Cadastrar">
                        </div>
       
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
