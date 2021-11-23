<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('js/sidebar.js') }}" defer></script>


<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->

    <div class="d-flex align-items-stretch " style="height: 94vh; width: 150px;
    ">
        <ul class="list-group " style="width: 180px; border-radius: 0; ">
           
            <li class="list-group-item border-0">
                <a class="" data-bs-toggle="collapse" href="#revistas" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Revistas
                </a>
                <ul class="list-group border-0 collapse" id="revistas">
                    <li class="list-group-item  border-0"><a href="{{ route('create.revista.view')}}">Cadastrar</a></li>
                    <li class="list-group-item  border-0"><a href="{{ route('list.revista.mgmt') }}">Gerenciar</a></li>
                </ul>
            </li>

            <li class="list-group-item border-0">
                <a class="" data-bs-toggle="collapse" href="" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Autores
                </a>
                <ul class="list-group-item border-0 collapse" id="">
                    <li class="list-group-item  border-0"><a href="#">Cadastrar</a></li>
                    <li class="list-group-item  border-0"><a href="#">Gerenciar</a></li>
                </ul>
            </li>

            <li class="list-group-item border-0">
                <a class="" data-bs-toggle="collapse" href="" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Avaliadores
                </a>
                <ul class="list-group-item border-0 collapse" id="">
                    <li class="list-group-item  border-0"><a href="#">Cadastrar</a></li>
                    <li class="list-group-item  border-0"><a href="#">Gerenciar</a></li>
                </ul>
            </li>
        </ul>
    </div>


</div>
