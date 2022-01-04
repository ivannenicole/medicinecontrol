@extends('layouts.main')

@section('title', 'MedicineControl')

@section('content') <!-- conteúdo da página -->

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