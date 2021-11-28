@extends('layouts.app')

@section('content')

<div class="d-flex bg-light ">
    <x-sidebar/>
    <div class="container mt-5 height-100 bg-light">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        @hasrole('avaliador')
                            Você está logado como avaliador!
                        @endhasrole
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer/>
</div>



@endsection
