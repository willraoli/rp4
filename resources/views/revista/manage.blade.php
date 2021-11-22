<?php 
    use Illuminate\Support\Facades\DB;
?>

@extends('layouts.app')

@section('content')
<div class="container" >
        <h3>Gerenciamento de Revistas</h3>
        <hr>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <th scope="col">Id</th>
                <th scope="col">Título</th>
                <th scope="col">Editor</th>
                <th scope="col">ISSN</th>
                <th scope="col">Limite de Artigos</th>
                <th scope="col">Área</th>
                <th scope="col">Periodicidade</th>
                <th class="table-borderless" scope="col"></th>
                <th class="table-borderless" scope="col"></th>
            </thead>
            <tbody>
                @foreach($revistas as $revista)
                <tr scope="row">

                    <td>{{ $revista->id }}</td>
                    <td>{{ $revista->tituloRevista }}</td>
                    <td>{{ $revista->editor->nome }}</td>
                    <td>{{ $revista->ISSNRevista }}</td>
                    <td>{{ $revista->limiteArtigo }}</td>
                    <td>{{ $revista->area->descricaoArea }}</td>
                    <td>{{ $revista->periodicidade }}</td>
                    
                    <td class="text-center">
                        <a class="btn btn-primary" href="{{ route('select.revista', $revista->id) }}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-danger" href="{{ route('delete.revista', $revista->id) }}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection