<?php

use Illuminate\Support\Facades\DB;
?>

@extends('layouts.app')
@section('content')

<div class="container pt-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <h3 class="text-center">Edição das informações do Editor</h3>
                <form action="{{ route('alterar_editor', $editor->id) }}" method="POST">

                    @csrf
                    <div class="form-group mb-2">
                        <label for="">Nome</label><br>
                        <input type="text" name="nome" class="form-control" value="{{ $editor->nome }}"><br>
                        <p style="color: red";>@error('nome') {{$message}} @enderror<p>
                        <label for="">Email</label><br>
                        <input type="email" name="email" class="form-control" disabled value="{{ $editor->email }}"><br>
                        <p style="color: red";>@error('email') {{$message}} @enderror<p>
                        <label for="">Telefone</label> <br />
                        <input type="tel" class="form-control" name="telefone" value="{{ $editor->telefone }}"> <br />
                        <p style="color: red";>@error('telefone') {{$message}} @enderror<p>
                        <label for="">Endereco</label><br>
                        <input type="text" name="endereco" class="form-control" value="{{ $editor->endereco }}"><br>
                        <p style="color: red";>@error('endereco') {{$message}} @enderror<p>
                        <label for="">País de origem<span id="obrigatorio">*</span></label> <br />
                        <select class="form-control" name="pais_id" id="paises" value="{{ $editor->pais_id}}"> <br />
                            <option value="" disabled>-</option>
                            <?php
                            $paises = DB::table('paises')->get();
                            foreach ($paises as $p) {
                                echo '<option value=' . $p->id . '>' . $p->nomePais . '</option>';
                            }
                            ?>
                        </select>
                        <p style="color: red";>@error('pais') {{$message}} @enderror<p>
                        <label for="">Especialidade<span id="obrigatorio">*</span></label> <br />
                        <select class="form-control" name="especialidade" value="{{ $editor->pais_id}}"> <br />
                            <option value="" disabled>-</option>
                            <?php
                            $areas = DB::table('areas')->get();
                            foreach ($areas as $a) {
                                echo '<option value=' . $a->id . '>' . $a->descricaoArea . '</option>';
                            }
                            ?>
                        </select>
                        <p style="color: red";>@error('area_pref') {{$message}} @enderror<p>
                        <label for="">Data de Contratação</label><br>
                        <input type="date" name="dataContratacao" class="form-control" value="{{ $editor->dataContratacao }}"><br>
                        <p style="color: red" ;>@error('dataContratacao') {{$message}} @enderror<p>
                        <label for="">Data de Demissão</label><br>
                        <input type="date" name="dataDemissao" class="form-control" disabled value="{{ $editor->dataDemissao }}"><br>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <p style="color: red" ;>@error('dataDemissao') {{$message}} @enderror<p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<x-footer />
@endsection
