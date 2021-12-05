<?php use Illuminate\Support\Facades\DB; ?>
@extends('layouts.app')
@section('content')
<div class="container pt-5" >
    <div  class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <form action="{{ route('cadastro_autor') }}" method="POST">
                    <h3 class="text-center">Cadastro de Autor</h3>

                    @csrf
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Nome</label><span id="obrigatorio">*</span><br>
                        <input type="text" name="nome" class="form-control" required><br>
                        <p style="color: red" ;>@error('nome') {{$message}} @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Email</label><span id="obrigatorio">*</span><br>
                        <input type="email" name="email" class="form-control" required><br>
                        <p style="color: red" ;>@error('email') {{$message}} @enderror
                    </div>
                    <?php
                        if(isset($_GET['err'])){
                            echo '<h6 class="text-center" id="obrigatorio"><small>Email já existente!</small></h6>';
                        }
                    ?>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Senha</label><span id="obrigatorio">*</span><br>
                        <input type="password" name="password" class="form-control"><br>
                        <p style="color: red" ;>@error('password') {{$message}} @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Endereço</label><br>
                        <input type="text" name="endereco" class="form-control"><br>
                        <p style="color: red" ;>@error('endereco') {{$message}} @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Telefone</label><br>
                        <input type="number" name="telefone" class="form-control"><br>
                        <p style="color: red" ;>@error('telefone') {{$message}} @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Área de preferência</label><br>
                        <input type="text" name="area_pref" class="form-control"><br>
                        <p style="color: red" ;>@error('area_pref') {{$message}} @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Instituição</label><br>
                        <input type="text" name="instituicao" class="form-control"><br>
                        <p style="color: red" ;>@error('instituicao') {{$message}} @enderror
                    </div>
                    <div class="form-group mb-2 col-5 me-5">
                        <label for="">País de origem<span id="obrigatorio">*</span></label> <br />
                        <select class="form-control" name="pais_origem" id="paises"> <br />
                            <option value="" disabled>-</option>
                            <?php
                            $paises = DB::table('paises')->get();
                            foreach ($paises as $p) {
                                echo '<option value=' . $p->id . '>' . $p->nomePais . '</option>';
                            }
                            ?>
                        </select>
                        <p style="color: red" ;>@error('pais_origem') {{$message}} @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-3 form-group pt-2">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <x-footer/> -->
@endsection