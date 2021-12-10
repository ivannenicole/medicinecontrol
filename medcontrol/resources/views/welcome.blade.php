@extends('layouts.main')

@section('title', 'MedicineControl')

@section('content') <!-- conteúdo da página -->

<!-- Navbar superior -->
<nav class="navbar navbar-expand-lg navbar-dark bg-info">

    <div class="container">
            <span class="navbar-brand mb-0 h1">MedicineControl</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contatos</a>
                    </li>
                </ul>
            </div>
    </div>
</nav>
        <!-- Parte central da tela -->
    <div id="corpo">
        <div id="fundo" class="row no-gutters">
            <img id="imgfundo" class="img-fluid img-responsive" src="imagens/fundo.png">
        </div>
            
        <div class="col-6" id="txtprincipal">
            <p id="bemvindo">Seja bem-vindo ao MedicineControl, seu sistema para controle de medicações. É seu primeiro acesso? 
                Realize o cadastro da sua instituição. Já é nosso cliente? Faça login.
            </p>
                <!--<a class="btn btn-info" id="botao" href="login" role="button">Entrar</a>-->
                <a class="btn btn-info" id="botao" href="register" role="button">Cadastrar-se</a>
        </div>
    </div>
    
@endsection