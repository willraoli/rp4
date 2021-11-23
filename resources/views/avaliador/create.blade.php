@extends('layouts.app')
@section('content')
<div class="container pt-5" >
    <div  class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <form action="{{ route('cadastroAvaliador') }}" method="POST">
                    <h3 class="text-center">Cadastro de Avaliador</h3>
        @csrf
        <div class=form-group>
            <label for="">Nome</label> <br />
            <input type="text" class="form-control" placeholder="Nome" name="nome"> <br />
        </div>
        <div class=form-group>
            <label for="">E-mail</label> <br />
            <input type="email" class="form-control" placeholder="Insira o e-mail" name="email"> <br />
        </div>
        <div class=form-group>
            <label for="">Endereço</label> <br />
            <input type="text" class="form-control" placeholder="Insira seu endereço" name="endereco"> <br />
        </div>
        <div class=form-group>
            <label for="">Telefone</label> <br />
        <input type="number" class="form-control" placeholder="Número" name="telefone"> <br />
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