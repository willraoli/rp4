<?php use Illuminate\Support\Facades\DB; ?>
@extends('layouts.app')
@section('content')
<div class="container pt-5" >
    <div  class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <h3 class="text-center">Edição de autor</h3>
                <form action="{{ route('edicao_autor', $autor->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Nome</label><span id="obrigatorio">*</span><br>
                        <input type="text" name="nome" class="form-control" value="{{ $autor->nome }}" required><br>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Email</label><span id="obrigatorio">*</span><br>
                        <input type="email" name="email" class="form-control" value="{{ $autor->email }}" required><br>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Senha</label><span id="obrigatorio">*</span><br>
                        <input type="password" name="password" value="{{ $autor->password }}" class="form-control"><br>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Endereço</label><br>
                        <input type="text" name="endereco" value="{{ $autor->endereco }}" class="form-control"><br>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Telefone</label><br>
                        <input type="number" name="telefone" value="{{ $autor->telefone }}" class="form-control"><br>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Área de preferência</label><br>
                        <input type="text" name="area_pref" value="{{ $autor->area_pref }}" class="form-control"><br>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Instituição</label><br>
                        <input type="text" name="instituicao" value="{{ $autor->instituicao }}" class="form-control"><br>
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
                    </div>
                    <div class="row">
                        <div class="col form-group pt-2 align-center text-center">
                            <input type="submit" name="submit" class="btn btn-success btn-md col-6" style="color:white;" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<x-footer/>
@endsection