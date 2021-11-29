<?php
    use Illuminate\Support\Facades\DB;
?>
@extends('layouts.app')
@section('content')
<div class="container pt-10">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <form action="{{ route('create.avaliador') }}" method="POST">
                    <h3 class="text-center">Cadastro de Avaliador</h3>
                    @csrf
                    <div class="input-group">
                        <label for="">Nome<span id="obrigatorio">*</span></label> <br />
                        <input type="text" class="form-control" name="nome" placeholder="Nome" />
                        <label for="">E-mail<span id="obrigatorio">*</span></label> <br />
                        <input type="email" class="form-control" name="email" placeholder="Email" />
                    </div>
                    <p style="color: red" ;>@error('nome') {{$message}} @enderror
                    <p>
                    <p style="color: red" ;>@error('email') {{$message}} @enderror
                    <p>
                    <?php
                        if(isset($_GET['err'])){
                            echo '<h6 class="text-center" id="obrigatorio"><small>Email já existente!</small></h6>';
                        }
                    ?>
                        <!-- <div class="form-group">
            <label for="">Nome<span id="obrigatorio">*</span></label> <br />
            <input type="text" class="form-control" placeholder="Nome" name="nome" required> <br />
        </div>
        <div class="form-group">
            <label for="">E-mail<span id="obrigatorio">*</span></label> <br />
            <input type="email" class="form-control" placeholder="Insira o e-mail" name="email" required> <br />
        </div> -->
                    <div class=form-group>
                        <label for="">Senha<span id="obrigatorio">*</span></label> <br />
                        <input type="password" class="form-control" placeholder="Senha" name="password" required> <br />
                    </div>
                    <div class=form-group>
                        <label for="">Endereço<span id="obrigatorio">*</span></label> <br />
                        <input type="text" class="form-control" placeholder="Insira seu endereço" name="endereco"> <br />
                        <p style="color: red" ;>@error('endereco') {{$message}} @enderror
                        <p>
                    </div>
                    <div class=form-group>
                        <label for="">Telefone<span id="obrigatorio">*</span></label> <br />
                        <input type="number" class="form-control" placeholder="Número" name="telefone"> <br />
                        <p style="color: red" ;>@error('telefone') {{$message}} @enderror
                        <p>
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
                    <p style="color: red" ;>@error('pais_origem') {{$message}} @enderror
                    <p>
                    <div class="form-group mb-2 col-5 me-5">
                        <label for="">Área de maior Preferência<span id="obrigatorio">*</span></label> <br />
                        <select class="form-control" name="area_pref" id="areas">
                            <option value="" disabled>-</option>
                            <?php
                                  $areas = DB::table('areas')->get();
                                  foreach($areas as $area){
                                      echo '<option value='.$area->id.'>'.$area->descricaoArea.'</option>';
                                  }
                            ?>
                        </select>
                    </div>


                    <p style="color: red" ;>@error('area_pref') {{$message}} @enderror
                    <p>
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
