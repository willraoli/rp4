<?php
    use Illuminate\Support\Facades\DB;
?>

@extends('layouts.app')
@section('content')

<div class="container pt-5" >
    <div  class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <h3 class="text-center">Edição das informações do Avaliador</h3>
                <form action="{{ route('editarAvaliador', $avaliador->id) }}" method="POST">
        @csrf
        <div class="form-group mb-2">
        <label for="">Nome<span id="obrigatorio">*</span></label><br>
        <input type="text" name="nome" class="form-control" value="{{ $avaliador->nome }}"><br>
        <p style="color: red";>@error('nome') {{$message}} @enderror<p>
        <label for="">Email<span id="obrigatorio">*</span></label><br>
        <input type="email" name="email" class="form-control" value="{{ $avaliador->email }}"><br>
        <p style="color: red";>@error('email') {{$message}} @enderror<p>
        <?php
            if(isset($_GET['err'])){
                echo '<h6 class="text-center" id="obrigatorio"><small>Erro ao atualizar revista!</small></h6>';
                    }
        ?>
        <label for="">Endereço<span id="obrigatorio">*</span></label><br>
        <input type="text" name="endereco" class="form-control" value="{{ $avaliador->endereco }}"><br>
        <p style="color: red";>@error('endereco') {{$message}} @enderror<p>
        <label for="" >Telefone<span id="obrigatorio">*</span></label><br>
        <input type="number" name="telefone" class="form-control" value="{{ $avaliador->telefone }}"><br>
        <p style="color: red";>@error('telefone') {{$message}} @enderror<p>
        <label for="">País de origem<span id="obrigatorio">*</span></label> <br />
            <select class="form-control" name="pais_origem" id="paises" value="{{ $avaliador->pais_origem }}"> <br />
            <option value="" disabled>-</option>
            <?php
                            $paises = DB::table('paises')->get();
                            foreach ($paises as $p) {
                                echo '<option value=' . $p->id . '>' . $p->nomePais . '</option>';
                            }
                            ?>
            </select>
        </div>
        <p style="color: red";>@error('pais_origem') {{$message}} @enderror<p>
        <label for="">Área de interesse<span id="obrigatorio">*</span></label> <br />
            <select class="from-control" name="area_pref" id="areasPref" style="border: 2px solid gray;" value="{{ $avaliador->area_pref }}">
                <option selected="selected">Engenharia de Software</option>
                <option>Ciência da Computação</option>
                <option>Física</option>
                <option>Biologia</option>
                <option>Matemática</option>
                <option>Química</option>
            </select>
        <div>
        <p style="color: red";>@error('area_pref') {{$message}} @enderror<p>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
            </div>
        </div>
    </div>
</div>

@endsection
