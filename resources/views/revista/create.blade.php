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
                        <select class="form-control mt-2" size="4" name="editor" id="editor" style="border-radius:0% !important" required>
                            @foreach($editores as $editor)
                                <option value='{{ $editor->id}}'>{{ $editor->nome }}</option>
                            @endforeach
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
                            <option value="" disabled>-</option>
                            <?php
                                  $periodicidades = DB::table('periodicidades')->get();
                                  foreach($periodicidades as $p){
                                      echo '<option value='.$p->id.'>'.$p->descricaoPeriodicidade.'</option>';
                                  }
                            ?>
                        </select>
                        </div>

                        <div class="form-group mb-2 col-6 ">
                        <label for="areas" class="ms-3">Áreas</label><br>

                        <select class="form-control" name="areas" id="areas">
                            <option value="" disabled>-</option>
                            <?php
                                  $areas = DB::table('areas')->get();
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

<x-footer/>
@endsection
