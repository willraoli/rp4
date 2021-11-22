<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletando informações de um Avaliador</title>
</head>
<body>
    <form action="{{ route('excluirAvaliador', $avaliador->id) }}" method="POST">
        @csrf
        <label for="">Tem certeza que deseja excluir este Avaliador?</label> <br />
        <input type="text" name="nome" value=" {{ $avaliador->nome }}"> <br />
        <button>Sim</button>
    </form>
</body>
</html>