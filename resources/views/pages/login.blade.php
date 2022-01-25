@extends('layouts.layout')

@section('title', 'MedicineControl - Login')

@section('content')

    <div class="container container-fluid py-5 px-4">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" :value="old('email')" autofocus required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                <div id="passwordHelp" class="form-text">Senha com ao menos 8 caracteres</div>
            </div>
            <div class="mb-4">
                @if (Route::has('password.request'))
                    Esqueceu a senha?
                    <a class="link-form" href="{{ route('password.request') }}">Clique Aqui</a>
                @endif
            </div>
            <div>
                <button type="submit" class="btn btn-dark py-3 px-5">Logar</button>
            </div>
        </form>
    </div>

@endsection