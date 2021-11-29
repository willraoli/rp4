<?php

use Illuminate\Support\Facades\DB;
?>

@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Gerenciamento de Editores</h3>
    <hr>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Data de Contratação</th>
            <th scope="col">Data de Demissão</th>
            <th class="table-borderless" scope="col"></th>
            <th class="table-borderless" scope="col"></th>
        </thead>
        <tbody>
            @foreach($editor as $editor)
            <tr scope="row">

                <td>{{ $editor->id }}</td>
                <td>{{ $editor->nome }}</td>
                <td>{{ $editor->dataContratacao}}</td>
                <td>{{ $editor->dataDemissao}}</td>
                <td class="text-center">
                    <a class="btn btn-primary" href="{{ route('alterar_editor', $editor->id) }}">
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
                            <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo deletar esse Editor?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ $editor->nome }}  <!-- SE TIVER PROBLEMAS COMENTAR ESSA LINHA -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" >
                                <a href="{{ route('excluir_editor', $editor->id) }}" style="color: white;text-decoration: none;">
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
