@extends('layouts.app')

@section('content')
<div class="container" >
    <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">
                <form id="login-form" class="form" action="" method="POST">
                    <h3 class="text-center">Cadastro de Nova Revista</h3>
                        
                    <div class="form-group mb-2">
                        <label for="titulo" class="ms-3" m>Título<span id="obrigatorio">*</span></label><br>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="editor" class="ms-3">Editor<span id="obrigatorio">*</span></label><br>
                        <input type="text" name="editor" id="editor" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="issn" class="ms-3">ISSN<span id="obrigatorio">*</span></label><br>
                        <input type="text" name="issn" id="issn" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="limite" class="ms-3">Limite de Artigos<span id="obrigatorio">*</span></label><br>
                        <input type="text" name="limite" id="limite" class="form-control" required>
                    </div>

                    <div class="d-flex">
                        <!-- <div class="form-group mb-2 col-5 me-5">
                            <label for="freq" class="ms-3">Frequência</label><br>
                            <input type="text" name="freq" id="freq" class="form-control" required>
                        </div>
                        <p class="pt-4">-</p>
                        <div class="form-group mb-2 col-5 ms-5"> -->
                        <div class="form-group mb-2 col-5 me-5">
                            <label for="limite" class="ms-3">Periodicidade<span id="obrigatorio">*</span></label><br>
                            <select class="form-control" name="areas" id="areas">
                                <option>Diária</option>
                                <option>Semanal</option>
                                <option>Bissemanal</option>
                                <option>Quinzenal</option>
                                <option>Mensal</option>
                                <option>Bimensal</option>
                                <option>Bimestral</option>
                                <option>Trimestral</option>
                                <option>Quadrimestral</option>
                                <option>Semestral</option>
                                <option>Anual</option>
                                <option>Quinquenal</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-2 col-6 ">
                        <label for="areas" class="ms-3">Áreas</label><br>
                        <select class="form-control" name="areas" id="areas">
                            <option>-</option>
                            <option>Ciências Exatas e da Terra</option>
                            <option>Ciências Biológicas.</option>
                            <option>Engenharias</option>
                            <option>Ciências Humanas</option>
                        </select>
                    </div>
                    </div>
<!--   

                    <div class="form-group mb-2">
                        <label for="areas" class="ms-3">Áreas</label><br>
                        <select class="form-control" name="areas" id="areas">
                            <option>-</option>
                            <option>Ciências Exatas e da Terra</option>
                            <option>Ciências Biológicas.</option>
                            <option>Engenharias</option>
                            <option>Ciências Humanas</option>
                        </select>
                    </div> -->

                    <div class="row">
                        <div class="col-3 form-group pt-2">
                            <input type="submit" name="submit" class="btn btn-success btn-md" style="color:white;" value="Cadastrar">
                        </div>
       
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
