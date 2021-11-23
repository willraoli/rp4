@extends('layouts.app')
@section('content')
<div class="container pt-5" >
    <div  class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
            <h3>Tem certeza que deseja excluir este Avaliador?</h3>
                <form action="{{ route('excluirAvaliador', $avaliador->id) }}" method="POST">
        @csrf
        <div>
        <input type="text" class="form-control" name="nome" value=" {{ $avaliador->nome }}"> <br />
        </div>
    <div class="row">
        <div>
        <button type="submit" class="btn btn-primary">Sim</button>
        </div>
    </div>    
    </form>
            </div>
        </div>
    </div>
</div>


<x-footer/>
@endsection