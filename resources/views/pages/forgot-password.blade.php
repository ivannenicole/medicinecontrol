@extends('layouts.layout')

@section('title', 'MedicineControl - Resetar Senha')

@section('content')

    <div class="container container-fluid py-4 px-4">
        <div class="bloco d-flex flex-column justify-content-center align-items-center">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="w-full d-flex justify-content-center">
                <img id="logo" src="assets/first-aid-kit.png" alt="logo">
            </div>
            <div class="w-full bg-inputs mt-5 d-flex flex-column justify-content-center aligh-items-center">
                <div class="d-flex justify-content-center">
                    <p>Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e nós lhe enviaremos um link de 
                        redefinição de senha que permitirá que você escolha uma nova.</p>
                </div>
                <div>
                    <form method="POST" action="{{ route('password.email') }}" class="d-flex flex-column justify-content-center">
                        @csrf
                    
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" :value="old('email')" autofocus required>
                        </div>
                        <div class="align-self-end">
                            <button type="submit" class="btn btn-dark btn-gr py-3 px-5">Enviar link de reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection