<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informação do Avaliador</title>
</head>

<body>
        <label for="">Nome</label> <br />
        <input type="text" name="nome" value="{{ $avaliador->nome }}"> <br />
        <label for="">E-mail</label> <br />
        <input type="text" name="email" value="{{ $avaliador->email }}"> <br />
        <label for="">Endereço</label> <br />
        <input type="text" name="endereco" value="{{ $avaliador->endereco }}"> <br />
        <label for="">Telefone</label> <br />
        <input type="number" name="telefone" value="{{ $avaliador->telefone }}"> <br />
        <button>Salvar</button>
</body>
</html>