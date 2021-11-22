<?php 
    use Illuminate\Support\Facades\DB;   
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Gerenciamento de Revistas</h3>
    <hr>
    <div class="pagination justify-content-center" style="color: black;">
            {{ $revistas->links("pagination::bootstrap-4") }} 
    </div>
    <div class="container" style="margin-bottom: 100px;">
        <table class="table table-borderless table-hover">
            <thead class="table-dark">
                <th scope="col">Id</th>
                <th scope="col">Título</th>
                <th scope="col">Editor</th>
                <th scope="col">ISSN</th>
                <th scope="col">Limite de Artigos</th>
                <th scope="col">Área</th>
                <th scope="col">Periodicidade</th>
                <th class="" scope="col"></th>
                <th class="" scope="col"></th>
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
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del-modal">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="del-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo deletar a revista ?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Título: {{ $revista->tituloRevista }}  <!-- SE TIVER PROBLEMAS COMENTAR ESSA LINHA -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" >
                                <a href="{{ route('delete.revista', $revista->id) }}" style="color: white;text-decoration: none;">
                                Sim
                                </a>    
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-footer/>
    

</div>

@endsection