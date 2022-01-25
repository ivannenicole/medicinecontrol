@extends('layouts.layout')

@section('title', 'MedicineControl - Editar Estoque Medicamento')

@section('content')

    <section class="container container-fluid pt-3 pb-5 px-4">
        <div class="mt-5 d-flex flex-column justify-content-center align-items-center">
            <h2 class="title-page mb-4">Editar Medicamento em Estoque</h2>
        </div>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('update-estoque', ['id' => $estoque_med->id]) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="med_id" class="form-label">Medicamento</label>
                <select class="form-select" id="med_id" name="med_id" autofocus>
                    <option selected disabled>Escolha...</option>
                    @foreach ($medicamentos as $medicamento)
                        @if ($estoque_med->med_id == $medicamento->id)
                            <option value="{{ $medicamento->id }}" selected>{{ $medicamento->name }}</option>
                        @else
                            <option value="{{ $medicamento->id }}">{{ $medicamento->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="unidades_med" class="form-label">Unidades do Medicamento</label>
                <input type="number" class="form-control" id="unidades_med" name="unidades_med" value="{{ $estoque_med->unidades_med }}" required>
            </div>
            <div class="mb-3">
                <label for="peso_unidade" class="form-label">Peso por unidade (gramas)</label>
                <input type="number" class="form-control" id="peso_unidade" name="peso_unidade" value="{{ $estoque_med->peso_unidade }}" required>
            </div>
            <div class="mb-4">
                <label for="valor_unidade" class="form-label">Valor por unidade</label>
                <input type="number" class="form-control" id="valor_unidade" name="valor_unidade" value="{{ $estoque_med->valor_unidade }}" required>
            </div>
            <div>
                <button type="submit" class="btn btn-dark py-3 px-5">Editar</button>
            </div>
        </form>
    </section>

@endsection

