<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar editor</title>
</head>

<body>
    <form action="{{route('excluir_editor', ['id' => $editor->id]) }}" method="POST">
        @csrf
        <label for="Tem certeza que deseja excluir este editor?"></label>
        <label for="">Nome</label>
        <input type="text" disabled="disabled" name="nome" value="{{$editor->nome}}">
        <label for="">Data de Contratação</label>
        <input type="text" disabled="disabled" name="dataContratacao" value="{{$editor->dataContratacao}}">
        <label for="">Data de Demissão</label>
        <input type="text" disabled="disabled" name="dataDemissao" value="{{$editor->dataDemissao}}"></br>
        <label for=>Tem certeza que deseja excluir esse editor?</label></br>
        <button>Sim</button></br>
    </form>
</body>

</html>
