<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('js/sidebar.js') }}" defer></script>


<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->

    <div class="d-flex align-items-stretch " style="height: 94vh; width: 150px; background-color:white; ">
        <ul class="list-group " style="width: 180px; border-radius: 0; ">

            <li id="list-tree" class="list-group-item border-0">
                <a class="" data-bs-toggle="collapse" href="#revistas" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Revistas
                </a>
                <ul class="list-group border-0 collapse" id="revistas">
                    <li id="list-tree" class="list-group-item  border-0"><a href="{{ route('create.revista.view')}}">Cadastrar</a></li>
                    <li id="list-tree" class="list-group-item  border-0"><a href="{{ route('list.revista.mgmt') }}">Gerenciar</a></li>
                </ul>
            </li>

            <li id="list-tree" class="list-group-item border-0">
                <a class="" data-bs-toggle="collapse" href="#autores" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Autores
                </a>
                <ul class="list-group-item border-0 collapse" id="autores">
                    <li id="list-tree" class="list-group-item  border-0"><a href="{{ route('create.autor.view') }}">Cadastrar</a></li>
                    <li id="list-tree" class="list-group-item  border-0"><a href="{{ route('list.autor.mgmt') }}">Gerenciar</a></li>
                </ul>
            </li>

            <li id="list-tree" class="list-group-item border-0">
                <a class="" data-bs-toggle="collapse" href="#avaliadores" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Avaliadores
                </a>
                <ul class="list-group-item border-0 collapse" id="avaliadores">
                    <li id="list-tree" class="list-group-item  border-0"><a href="{{ route('create.avaliador.view') }}">Cadastrar</a></li>
                    <li id="list-tree" class="list-group-item  border-0"><a href="{{ route('listaAvaliadores')}}">Gerenciar</a></li>
                </ul>
            </li>

            <li id="list-tree" class="list-group-item border-0">
                <a class="" data-bs-toggle="collapse" href="#editores" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Editores
                </a>
                <ul class="list-group-item border-0 collapse" id="editores">
                    <li id="list-tree" class="list-group-item  border-0"><a href="{{ route('create.editor.view') }}">Cadastrar</a></li>
                    <li id="list-tree" class="list-group-item  border-0"><a href="{{ route('listaEditores') }}">Gerenciar</a></li>
                </ul>
            </li>
        </ul>
    </div>


</div>
