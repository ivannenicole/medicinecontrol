@extends('layouts.layout')

@section('title', 'MedicineControl - Cadastro')

@section('content')

    <div class="container container-fluid py-5 px-4">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome da Instituição</label>
                <input type="text" class="form-control" id="name" name="name" :value="old('name')" required autofocus>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" :value="old('email')" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição da Instituição</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Foto da Instituição (Opcional)</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="configrmpassword" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="mb-4">
                Já possui conta?
                <a class="link-form" href="{{ route('login') }}">Clique Aqui</a>
            </div>
            <div>
                <button type="submit" class="btn btn-dark py-3 px-5">Cadastrar</button>
            </div>
        </form>
    </div>

@endsection