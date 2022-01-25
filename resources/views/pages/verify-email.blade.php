@extends('layouts.layout')

@section('title', 'MedicineControl - Verify Email')

@section('content')

    <section class="container container-fluid mt-4 mb-4 py-4 px-4">
        <div class="bloco d-flex flex-column justify-content-center align-items-center">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="w-full d-flex justify-content-center">
                <img id="logo" src="assets/first-aid-kit.png" alt="logo">
            </div>
            <div class="w-full bg-inputs mt-5 d-flex flex-column justify-content-center aligh-items-center">
                <div class="d-flex justify-content-start">
                    @role('admin')
                        <p>Lembre de resetar a senha do administrador, a senha padrão é: 12345678</p>
                    @endrole
                </div>
                <div class="d-flex justify-content-center">
                    <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>
                </div>
                <div class="d-flex justify-content-center">
                    <p>A new verification link has been sent to the email address you provided during registration.</p>
                </div>
                <div>
                    <form method="POST" action="{{ route('verification.send') }}" class="d-flex flex-column justify-content-center">
                        @csrf
                    
                        <div class="align-self-end">
                            <button type="submit" class="btn btn-dark btn-gr py-3 px-5">Reenviar verificação de email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection