@extends('layouts.layout')

@section('title', 'MedicineControl - Form Idoso')

@section('content')

    <div class="container container-fluid py-5 px-4">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('create-idoso') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome do Idoso</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus>
            </div>
            <div class="mb-3">
                <label for="name_resp" class="form-label">Nome do Responsável</label>
                <input type="text" class="form-control" id="name_resp" name="name_resp" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail do Responsável</label>
                <input type="email" class="form-control" id="email" name="email" :value="old('email')" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone do Responsável</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Foto do Idoso (Opcional)</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*">
            </div>
            <div class="mb-4">
                <label for="data_nasc" class="form-label">Data de Nascimento do Idoso</label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc" required>
            </div>
            <div>
                <button type="submit" class="btn btn-dark py-3 px-5">Cadastrar</button>
            </div>
        </form>
    </div>

@endsection
