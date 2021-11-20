<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Editor</title>
</head>

<body>
    <label for="">Nome</label>
    <input type='text' name='nome' value = "{{ $editor->nome }}">
    <label for="">Data de Contratação</label>
    <input type='text' name='dataContratacao' value="{{$editor->dataContratacao}}">
    <label for="">Data de Demissão</label>
    <input type='text' name='dataDemissao' value="{{ $editor -> datDemissao}}">
</body>

</html>
