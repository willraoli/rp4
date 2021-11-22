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
    <title>Cadastro de Avaliador</title>
</head>

<style>
    div{
    width: 350px;
    }
    button{
        width: 100px;
    }
</style>    

<body>
    <h1 class="display-4">Cadastro de Avaliador</h1>
    <form action="{{ route('cadastroAvaliador') }}" method="POST">
        @csrf
        <div class=form-group>
        <label for="">Nome</label> <br />
        <input type="text" class="form-control" placeholder="Nome" name="nome"> <br />
        </div>
        <div class=form-group>
        <label for="">E-mail</label> <br />
        <input type="email" class="form-control" placeholder="Insira o e-mail" name="email"> <br />
        </div>
        <div class=form-group>
        <label for="">Endereço</label> <br />
        <input type="text" class="form-control" placeholder="Insira seu endereço" name="endereco"> <br />
        </div>
        <div class=form-group>
        <label for="">Telefone</label> <br />
        <input type="number" class="form-control" placeholder="Número" name="telefone"> <br />
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</body>

<x-footer/>
</html>