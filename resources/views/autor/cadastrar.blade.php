<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Autor</title>
</head>
<body>
    <form action="{{ route('cadastro_autor') }}" method="POST">
        @csrf
        <label for="">Nome</label><br>
        <input type="text" name="nome"><br>
        <label for="">Email</label><br>
        <input type="email" name="email"><br>
        <label for="">Endereço</label><br>
        <input type="text" name="endereco"><br>
        <label for="">Telefone</label><br>
        <input type="number" name="telefone"><br>
        <button>Salvar</button>
    </form>
</body>
</html>