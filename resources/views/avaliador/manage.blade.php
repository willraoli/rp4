<?php 
    use Illuminate\Support\Facades\DB;
?>
@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>    

@section('content')
<div class="container" >
        <h3>Gerenciamento de Revistas</h3>
        <hr>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th class="table-borderless" scope="col"></th>
                <th class="table-borderless" scope="col"></th>
            </thead>
            <tbody>
                @foreach($avaliador as $avaliador)
                <tr scope="row">

                    <td>{{ $avaliador->id }}</td>
                    <td>{{ $avaliador->nome }}</td>
                    <td>{{ $avaliador->endereco }}</td>
                    <td>{{ $avaliador->email }}</td>
                    <td>{{ $avaliador->telefone }}</td>
                    
                    <td class="text-center">
                        <a class="btn btn-primary" href="{{ route('listaAvaliadores', $avaliador->id) }}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>            
                        </a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del-modal">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>