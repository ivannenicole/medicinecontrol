@extends('layouts.layout')

@section('title', 'MedicineControl - Dashboard')

@section('content')

    <section class="container container-fluid">
        <div class="my-5">
            <div class="d-flex justify-content-center">
                <h2 class="title-page hr-custom">Dashboard</h2>
            </div>

            @role('admin')
            <div class="dashboard container-fluid flex-wrap d-flex justify-content-center mt-4">
                <div class="estoque d-flex justify-content-center align-content-center flex-wrap mb-4">
                    <div class="card">
                        <div class="card-header">
                            Administração do Sistema
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3">Gerenciamento de Usuários do Sistema</h5>
                            <a href="{{ route('list-users') }}" class="btn btn-primary btn-gr">Listagem de usuários</a>
                        </div>
                    </div>
                </div>
            </div>
            @endrole

            @role('user')
            <div class="dashboard container-fluid flex-wrap d-flex justify-content-center mt-4">
                <div class="estoque d-flex justify-content-center align-content-center flex-wrap mb-4">
                    <div class="card">
                        <div class="card-header">
                            Estoque de Medicamentos
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Status</h5>
                            <p class="card-text">Total de Medicamentos em Estoque: {{ $estoque }} </p>
                            <p class="card-text">Valor total do estoque: {{ $valor_total }}</p>
                            <p class="card-text">Total de Medicamentos sem estoque: {{ $meds_empty }} </p>
                            <h5 class="card-title mb-3">Tabelas de Registros</h5>
                            <a href="{{ route('list-estoque') }}" class="btn btn-primary btn-gr">Estoque de Medicamentos</a>
                            <a href="{{ route('list-ministracao') }}" class="btn btn-primary btn-gr">Ministrações</a>
                            <h5 class="card-title mb-3 mt-3">Inserção de Dados</h5>
                            <a href="{{ route('form-estoque') }}" class="btn btn-primary btn-gr">Declarar Estoque de Medicamento</a>
                            <a href="{{ route('form-ministracao') }}" class="btn btn-primary btn-gr">Ministrar Medicamento para Idoso</a>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-content-center flex-wrap">
                    <div class="card">
                        <img src="{{ asset('assets/idosos.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Idosos</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Registros</h6>
                            <p class="card-text">Aqui você tem o controle dos dados dos idosos cadastrados na sua instituição.</p>
                            <a href="{{ route('list-idosos') }}" class="btn btn-primary btn-gr">Idosos Cadastrados</a>
                            <a href="{{ route('form-idoso') }}" class="btn btn-primary btn-gr">Cadastrar novos idosos</a>
                        </div>
                    </div>
                    <div class="card">
                        <img src="{{ asset('assets/service-00.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Medicamentos</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Registros</h6>
                            <p class="card-text">Aqui você tem o controle dos medicamentos a serem tomados pelos idosos.</p>
                            <a href="{{ route('list-meds') }}" class="btn btn-primary btn-gr">Cadastrados</a>
                            <a href="{{ route('form-med') }}" class="btn btn-primary btn-gr">Inserir novos medicamentos</a>
                        </div>
                    </div>
                </div>
            </div>
            @endrole
        </div>
    </section>

@endsection