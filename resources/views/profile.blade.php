@extends('layouts.app')

@section('content')

<div class="d-flex bg-light ">
    <x-sidebar/>
    <div class="container mt-5 height-100 bg-light">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="center">Perfil do usuário</h3>
                
                Nome<br>
                <input class="form-control" type="text" value="{{ auth()->user()->name }}" aria-label="Disabled input example" disabled readonly>
                Email<br>
                <input class="form-control" type="text" value="{{ auth()->user()->email }}" aria-label="Disabled input example" disabled readonly>
                @hasrole('autor')
                @endhasrole

                @hasrole('avaliador')
                @endhasrole

                @hasrole('editor')
                @endhasrole
            </div>
        </div>
    </div>
    <x-footer/>
</div>
@endsection