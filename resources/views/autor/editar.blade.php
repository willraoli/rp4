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
                        <label for="" class="ms-3">Nome</label><br>
                        <input type="text" name="nome" value="{{ $autor->nome }}" class="form-control"><br>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Email</label><br>
                        <input type="email" name="email" value="{{ $autor->email }}" class="form-control"><br>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Endereço</label><br>
                        <input type="text" name="endereco" value="{{ $autor->endereco }}" class="form-control"><br>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="ms-3">Telefone</label><br>
                        <input type="number" name="telefone" value="{{ $autor->telefone }}" class="form-control"><br>
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