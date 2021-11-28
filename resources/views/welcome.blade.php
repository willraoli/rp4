<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema para Controle de Revista Científica</title>

    <!-- Fonts -->
    <script src="https://use.fontawesome.com/1ce878220b.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased" style="height: 100vh;">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="#">
                <div class="text-start" style="color: white;" id="logo">
                    <i class="fa fa-book fa-1x" style="transition:none !important;" aria-hidden="true"></i>
                    <i class="fa fa-flask fa-1x" style="color: #6351ce;transition:none !important;" aria-hidden="true"></i>
                    {{ config('app.name', 'Revista') }}
                </div>
            </a>
        </div>
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-3 sm:block">
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</i></a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            <!-- @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth -->

            <a href="{{ route('create.avaliador.view') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Cadastrar Avaliador</a>
            <a href="{{ route('create.autor') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Cadastrar Autor</a>
            <a href="{{ route('create.editor') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Cadastrar Editor</a>
        </div>
        @endif
    </nav>

    <div class="container">
        <div class="row justify-content-md-center p-1 mb-5" style="margin-top: 20vh;">
            <div class="text-center mt-lg-5" style="color: #212529;">
                <i class="fa fa-book fa-4x" aria-hidden="true"></i>
                <i class="fa fa-flask fa-4x" style="color: #6351ce;" aria-hidden="true"></i>
            </div>
            <div class="text-center mt-lg-3">
                <h3>Nome do sistema de controle de revistas</h3>
                <small>Descrição breve do sistema</small>
            </div>
            <div>
                

            </div>

        </div>
    </div>

    <x-footer/>


</body>

</html>
