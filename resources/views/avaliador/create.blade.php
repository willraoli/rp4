<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Avaliador</title>
</head>

<body>
    <form action="{{ route('cadastroAvaliador') }}" method="POST">
        @csrf
        <label for="">Nome</label> <br />
        <input type="text" name="nome"> <br />
        <label for="">E-mail</label> <br />
        <input type="text" name="email"> <br />
        <label for="">Endereço</label> <br />
        <input type="text" name="endereco"> <br />
        <label for="">Telefone</label> <br />
        <input type="number" name="telefone"> <br />
        <button>Salvar</button>
    </form>
</body>
</html>