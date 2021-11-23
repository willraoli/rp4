@extends('layouts.app')
@section('content')
<div class="container pt-5" >
    <div  class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <form action="{{ route('registrar_editor') }}" method="POST">
                    <h3 class="text-center">Cadastro de Editor</h3>
        @csrf
        <div class=form-group>
            <label for="">Nome</label> <br />
            <input type="text" class="form-control" placeholder="Nome" name="nome"> <br />
        </div>
        <div class=form-group>
            <label for="">Data de Contratação</label> <br />
            <input type="date" class="form-control" placeholder="2001/06/01" name="dataContratacao"> <br />
        </div>
        <div class=form-group>
            <label for="">Data de Demissão</label> <br />
            <input type="date" class="form-control" placeholder="2001/06/01" name="dataDemissao"> <br />
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

<x-footer/>
@endsection
