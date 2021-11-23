@extends('layouts.app')
@section('content')
<div class="container pt-5 modal fade" id="del-editor-modal">
    <div  class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
            <h3>Tem certeza que deseja excluir este Editor?</h3>
                <form action="{{ route('excluir_editor', $editor->id) }}" method="POST">
        @csrf
        <div>
        <input type="text" class="form-control" name="nome" value=" {{ $editor->nome }}"> <br />
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

