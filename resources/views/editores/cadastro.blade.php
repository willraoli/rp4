<?php

use Illuminate\Support\Facades\DB;
?>


@extends('layouts.app')
@section('content')
<div class="container pt-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <form action="{{ route('registrar_editor') }}" method="POST">
                    <h3 class="text-center">Cadastro de Editor</h3>
                    @csrf
                    <div class=form-group>
                        <label for="">Nome</label> <br />
                        <input type="text" class="form-control" placeholder="Nome" name="nome"> <br />
                        <p style="color: red" ;>@error('nome') {{$message}} @enderror
                    </div>
                    <div class=form-group>
                        <label for="">Email</label> <br />
                        <input type="email" class="form-control" name="email"> <br />
                        <p style="color: red" ;>@error('email') {{$message}} @enderror
                    </div>
                    <div class=form-group>
                        <label for="">Senha</label> <br />
                        <input type="password" class="form-control" name="password"> <br />

                    </div>
                    <div class=form-group>
                        <label for="">Endereco</label> <br />
                        <input type="text" class="form-control" name="endereco"> <br />
                        <p style="color: red" ;>@error('endereco') {{$message}} @enderror
                    </div>
                    <div class=form-group>
                        <label for="">Telefone</label> <br />
                        <input type="tel" class="form-control" name="telefone"> <br />
                        <p style="color: red" ;>@error('telefone') {{$message}} @enderror
                    </div>
                    <div>
                        <label for="">País de origem<span id="obrigatorio">*</span></label> <br />
                        <select class="form-control" name="pais" id="pais"> <br />
                            <option value="" disabled>-</option>
                            <?php
                            $paises = DB::table('paises')->get();
                            foreach ($paises as $p) {
                                echo '<option value=' . $p->id . '>' . $p->nomePais . '</option>';
                            }
                            ?>
                        </select>
                        <p style="color: red" ;>@error('pais') {{$message}} @enderror
                    </div>

                    <div>
                        <label for="">Especialidade<span id="obrigatorio">*</span></label> <br />
                        <select class="form-control" name="especialidade" id="area"> <br />
                            <option value="" disabled>-</option>
                            <?php
                            $areas = DB::table('areas')->get();
                            foreach ($areas as $a) {
                                echo '<option value=' . $a->id . '>' . $a->descricaoArea . '</option>';
                            }
                            ?>
                               <p style="color: red" ;>@error('area_pref') {{$message}} @enderror
                        </select>
                    </div>
                    <div class=form-group>
                        <label for="">Data de Contratação</label> <br />
                        <input type="date" class="form-control" placeholder="2001/06/01" name="dataContratacao"> <br />
                        <p style="color: red" ;>@error('dataContratacao') {{$message}} @enderror
                    </div>
                    <div class=form-group>
                        <label for="">Data de Demissão</label> <br />
                        <input type="date" class="form-control" placeholder="2001/06/01" name="dataDemissao"> <br />
                        <p style="color: red" ;>@error('dataDemissao') {{$message}} @enderror
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

<x-footer />
@endsection
