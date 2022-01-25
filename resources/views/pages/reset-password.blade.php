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
                <img id="logo" src="{{ asset('assets/first-aid-kit.png') }}" alt="logo">
            </div>
            <div class="w-full bg-inputs mt-5 d-flex flex-column justify-content-center aligh-items-center">
                <div>
                    <form method="POST" action="{{ route('password.update') }}" class="d-flex flex-column justify-content-center">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" :value="old('email')" autofocus required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="current-password">
                        </div>
                        <div class="align-self-end">
                            <button type="submit" class="btn btn-dark btn-gr py-3 px-5">Resetar Senhar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection