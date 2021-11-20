<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar autor</title>
</head>
<body>
    <form action="{{ route('exclusao_autor', $autor->id) }}" method="POST">
        @csrf
        <label for="">Tem certeza que deseja excluir este autor?</label><br>
        <input type="text" name="nome" value="{{ $autor->nome }}"><br>
        <button>Sim</button>
    </form>
</body>
</html>