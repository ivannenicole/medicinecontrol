@extends('layouts.main')

@section('title', 'MedicineControl')

@section('content')

<div id="clientes-container" class="col-md-12">
    <h2> Clientes cadastrados<h2>
    <div id="cards-container" class="row">
        <!-- Colocar um for para percorrer o banco de dados-->
        <div class="card col-md-3">
            <img class="card-img-top" src="imagens/img-card.jpg" alt="Imagem de capa do card">
            <div class="card-body">
            <h5 class="card-title">Nome do cliente</h5>
            <p class="card-text">Informações básicas do cliente</p>
            <a href="#" class="btn btn-primary">Ver mais</a>
            </div>
        </div>
    </div>
</div>


@endsection
