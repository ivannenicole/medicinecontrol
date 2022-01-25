@extends('layouts.layout')

@section('title', 'MedicineControl - Form Medicamento')

@section('content')

    <div class="container container-fluid py-5 px-4">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('create-med') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome do Medicamento</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição do Medicamento</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="tipo_med" class="form-label">Tipo de Medicamento</label>
                <select class="form-select" id="tipo_med" name="tipo_med">
                    <option selected disabled>Escolha...</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="via_med" class="form-label">Via de Administração</label>
                <select class="form-select" id="via_med" name="via_med">
                    <option selected disabled>Escolha...</option>
                    @foreach ($vias as $via)
                        <option value="{{ $via->id }}">{{ $via->via_adm }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-dark py-3 px-5">Cadastrar</button>
            </div>
        </form>
    </div>

@endsection
