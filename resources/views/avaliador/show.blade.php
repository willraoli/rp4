<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta charset="UTF=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informações do Avaliador</title>
</head>

<style>
    div{
    width: 350px;
    }
</style> 

<body>
        <h1 class="display-4">Informações do Avaliador</h1>
        <div class=form-group>
        <label for="">Nome</label> <br />
        <input type="text" name="nome" class="form-control" value="{{ $avaliador->nome }}"> <br />
        <label for="">E-mail</label> <br />
        <input type="email" name="email" class="form-control" value="{{ $avaliador->email }}"> <br />
        <label for="">Endereço</label> <br />
        <input type="text" name="endereco" class="form-control" value="{{ $avaliador->endereco }}"> <br />
        <label for="">Telefone</label> <br />
        <input type="number" name="telefone" class="form-control" value="{{ $avaliador->telefone }}"> <br />
        </div>
</body>

<x-footer/>
</html>