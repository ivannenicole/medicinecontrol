@extends('layouts.layout')

@section('title', 'MedicineControl - Editar Idoso')

@section('content')

    <section class="container container-fluid pt-3 pb-5 px-4">
        <div class="mt-5 d-flex flex-column justify-content-center align-items-center">
            @if($idoso->image)
                <img id="profile-perfil" class="rounded-circle mb-3" src="{{ asset('users/idosos/' . $idoso->image) }}" alt="profile-idoso">
            @endif
            <h2 class="title-page mb-4">Editar Dados do Idoso</h2>
        </div>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('update-idoso', ['id' => $idoso->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome do Idoso</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $idoso->name }}" autofocus>
            </div>
            <div class="mb-3">
                <label for="name_resp" class="form-label">Nome do Responsável</label>
                <input type="text" class="form-control" id="name_resp" name="name_resp" value="{{ $idoso->name_resp }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail do Responsável</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $idoso->email }}">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone do Responsável</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" value="{{ $idoso->telefone }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Foto do Idoso</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*">
            </div>
            <div class="mb-4">
                <label for="data_nasc" class="form-label">Data de Nascimento do Idoso</label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc" value="{{ $idoso->data_nasc }}">
            </div>
            <div>
                <button type="submit" class="btn btn-dark py-3 px-5">Editar</button>
            </div>
        </form>
    </section>

@endsection

