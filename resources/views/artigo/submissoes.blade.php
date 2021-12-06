 <!-- Styles -->
 <link href="{{ asset('css/select.css') }}" rel="stylesheet" type="text/css">

@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h3>Submissões Pendentes</h3>
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
            </thead>
            <tbody>
                @foreach($submissoes as $submissao)
                <tr scope="row">

                    <td><p class="text-center">{{ $submissao->revista->tituloRevista}}</p></td>
                    <td>
                        @foreach($submissao->artigos as $artigo)
                            <a target="_blank" href="<?php echo url('storage/' . $artigo->caminhoArtigo); ?>">
                                <small><p class="articles mb-1 text-center p-1">{{ $artigo->tituloArtigo }}</br></p></small>    
                            </a>
                        @endforeach
                    </td>

                    <td>                        
                        @foreach($submissao->artigos[0]->autores as  $autor)
                            <small><p class="selected-author p-1 mb-1 text-center">{{ $autor->user->name }}</br></p></small>
                        @endforeach
                    </td>

                    <td><p class="text-center">{{ date('d/m/Y H:i:s', strtotime($submissao->created_at)) }}</p></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection