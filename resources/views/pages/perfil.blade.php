@extends('layouts.layout')

@section('title', 'MedicineControl - Perfil')

@section('content')

    <section class="container container-fluid">
        <div class="mt-5 d-flex flex-column justify-content-center align-items-center">
            @if(auth()->user()->image)
                <img id="profile-perfil" src="users/profile/{{ auth()->user()->image }}" alt="profile-img" class="rounded-circle mb-3">
            @endif
            <h2 class="title-page">Dados do Usuário</h2>
        </div>
        <div class="container container-fluid pt-3 pb-5 px-4">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('mes')" />

             <!-- Validation Errors -->
             <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form action="{{ route('update-perfil') }}" method="POST" enctype="multipart/form-data">
                @csrf
    
                <div class="mb-3">
                    <label for="name" class="form-label">Nome da Instituição</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" autofocus>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição da Instituição</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ auth()->user()->description }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="form-label">Foto da Instituição</label>
                    <input class="form-control" type="file" id="image" name="image" accept="image/*">
                </div>
                <div>
                    <button type="submit" class="btn btn-dark py-3 px-5">Editar</button>
                </div>
            </form>
        </div>
    </section>

@endsection
