<?php

use Illuminate\Support\Facades\DB;
?>

@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h3>Gerenciamento de Editores</h3>
    <hr>
    <div class="pagination justify-content-center" style="color: black;">
            {{ $editor->links("pagination::bootstrap-4") }} 
    </div>
    <div class="container" style="margin-bottom: 100px;">
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
                    <a class="btn btn-danger" data-toggle="modal" data-target="#del-editor-modal" href=#del-editor-modal>
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <x-footer />
    @endsection
