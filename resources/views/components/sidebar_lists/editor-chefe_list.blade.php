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
        <li id="list-tree" class="list-group-item  border-0"><a href="{{ route('create.autor') }}">Cadastrar</a></li>
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
        <li id="list-tree" class="list-group-item  border-0"><a href="{{ route('lista_editores') }}">Gerenciar</a></li>
    </ul>
</li>
