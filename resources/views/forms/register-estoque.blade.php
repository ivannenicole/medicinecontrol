@extends('layouts.layout')

@section('title', 'MedicineControl - Form Estoque')

@section('content')

    <div class="container container-fluid py-5 px-4">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('create-estoque') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="med_id" class="form-label">Medicamento</label>
                <select class="form-select" id="med_id" name="med_id" autofocus>
                    <option selected disabled>Escolha...</option>
                    @foreach ($medicamentos as $medicamento)
                        <option value="{{ $medicamento->id }}">{{ $medicamento->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="unidades_med" class="form-label">Unidades do Medicamento</label>
                <input type="number" class="form-control" id="unidades_med" name="unidades_med" required>
            </div>
            <div class="mb-3">
                <label for="peso_unidade" class="form-label">Peso por unidade (gramas)</label>
                <input type="number" class="form-control" id="peso_unidade" name="peso_unidade" required>
            </div>
            <div class="mb-4">
                <label for="valor_unidade" class="form-label">Valor por unidade</label>
                <input type="number" class="form-control" id="valor_unidade" name="valor_unidade" required>
            </div>
            <div>
                <button type="submit" class="btn btn-dark py-3 px-5">Cadastrar</button>
            </div>
        </form>
    </div>

@endsection
