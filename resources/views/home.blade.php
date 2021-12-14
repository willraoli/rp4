@extends('layouts.app')

@section('content')

<!-- <div class="d-flex bg-light "> -->
    
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
                        
                        Você está logado como
                        @foreach(auth()->user()->roles as $role)
                            , {{ ucwords($role->name) }}
                        @endforeach
                        !
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer/>
<!-- </div> -->



@endsection
