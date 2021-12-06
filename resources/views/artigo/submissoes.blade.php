 <!-- Styles -->
 <link href="{{ asset('css/select.css') }}" rel="stylesheet" type="text/css">

@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h3>Minhas submissões Pendentes</h3>
    <hr>
    <div class="pagination justify-content-center" style="color: black;">
            {{ $submissoes->links("pagination::bootstrap-4") }} 
    </div>
    <div class="container" style="margin-bottom: 100px;">
        <table style="transition:none !important;" class="table table-borderless table-hover">
            <thead class="table-dark">
                <th scope="col">Revista</th>
                <th scope="col">Artigos</th>
                <th scope="col">Autores</th>
                <th scope="col">Data de Submissão</th>
                <th class="" scope="col"></th>
                <th class="" scope="col"></th>
            </thead>
            <tbody>
                @foreach($submissoes as $submissao)
                <tr scope="row">

                    <td>{{ $submissao->revista->tituloRevista}}</td>
                    <td>
                        @foreach($submissao->artigos as $artigo)
                            <a target="_blank" href="<?php echo url('storage/' . $artigo->caminhoArtigo); ?>">
                                <span class="articles ms-2 p-1">{{ $artigo->tituloArtigo . " " }}</span>    
                            </a>
                        @endforeach
                    </td>

                    <td>
                        @foreach($submissao->artigos as $artigo)
                            @foreach($artigo->autores as  $autor)
                                <span class="selected-author ms-2 p-1">{{ $autor->nome . " " }}</span> 
                            @endforeach
                        @endforeach
                    </td>

                    <td>
                        {{ date('d/m/Y H:i:s', strtotime($submissao->created_at)) }}
                    </td>

                    
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection