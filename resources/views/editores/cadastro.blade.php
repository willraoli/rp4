<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <title>Cadastrar Editores</title>
</head>

<body>
    <form action="{{ route('registrar_editor') }}" method = "POST">
        @csrf
        <label for="">Nome</label>
        <input type='text' name='nome'>
        <label for="">Data de Contratação</label>
        <input type='text' name='dataContratacao'>
        <label for="">Data de Demissão</label>
        <input type='text' name='dataDemissao'>
        <button>Salvar</button>
    </form>
    <x-footer/>
</body>

</html>
