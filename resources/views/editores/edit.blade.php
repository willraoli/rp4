@extends('layouts.app')
@section('content')

<div class="container pt-5" >
    <div  class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <h3 class="text-center">Edição das informações do Editor</h3>
                <form action="{{ route('alterar_editor', $editor->id) }}" method="POST">

        @csrf
        <div class="form-group mb-2">
        <label for="">Nome</label><br>
        <input type="text" name="nome" class="form-control" value="{{ $editor->nome }}"><br>
        <label for="">Data de Contratação</label><br>
        <input type="date" name="dataContratacao" class="form-control" value="{{ $editor->dataContratacao }}"><br>
        <label for="">Data de Demissão</label><br>
        <input type="date" name="dataDemissao" class="form-control" value="{{ $editor->dataDemissao }}"><br>
        <div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
            </div>
        </div>
    </div>
</div>
<x-footer/>
@endsection
