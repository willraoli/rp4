@extends('layouts.app')
@section('content')
<div class="container pt-5" >
    <div  class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <h3>Tem certeza que deseja excluir este autor?</h3>
                <form action="{{ route('exclusao_autor', $autor->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-2 align-center">
                        <input type="text" name="nome" value="{{ $autor->nome }}"><br>
                    </div>
                    <div class="row">
                        <div class="col-3 form-group pt-2">
                            <input type="submit" name="submit" class="btn btn-success btn-md" style="color:white;" value="Sim">
                        </div>
                    </div>
                </form>

<x-footer/>
@endsection