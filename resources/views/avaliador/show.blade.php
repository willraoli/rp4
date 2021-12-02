
 @extends('layouts.app')  
 @section('content')
 <div class="container pt-5" >
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <h3 class="text-center">Edição das informações do Avaliador</h3>
                    <label for="">Nome</label> <br />
                    <input type="text" name="nome" class="form-control" value="{{ $avaliador->nome }}"> <br />
                    <label for="">E-mail</label> <br />
                    <input type="email" name="email" class="form-control" value="{{ $avaliador->email }}"> <br />
                    <label for="">Endereço</label> <br />
                    <input type="text" name="endereco" class="form-control" value="{{ $avaliador->endereco }}"> <br />
                    <label for="">Telefone</label> <br />
                    <input type="number" name="telefone" class="form-control" value="{{ $avaliador->telefone }}"> <br />
                </div>
            </div>
        </div>
    </div>
<x-footer/>
@endsection