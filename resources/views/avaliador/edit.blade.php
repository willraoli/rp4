<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar informações de um Avaliador</title>
</head>
<body>
    <form action="{{ route('editarAvaliador', $avaliador->id) }}" method="POST">
        @csrf
        <label for="">Nome</label><br>
        <input type="text" name="nome" value="{{ $avaliador->nome }}"><br>
        <label for="">Email</label><br>
        <input type="email" name="email" value="{{ $avaliador->email }}"><br>
        <label for="">Endereço</label><br>
        <input type="text" name="endereco" value="{{ $avaliador->endereco }}"><br>
        <label for="">Telefone</label><br>
        <input type="number" name="telefone" value="{{ $avaliador->telefone }}"><br>
        <button>Salvar</button>
    </form>
</body>
</html>