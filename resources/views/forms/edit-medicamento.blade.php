@extends('layouts.layout')

@section('title', 'MedicineControl - Editar Medicamento')

@section('content')

    <section class="container container-fluid pt-3 pb-5 px-4">
        <div class="mt-5 d-flex flex-column justify-content-center align-items-center">
            <h2 class="title-page mb-4">Editar Medicamento</h2>
        </div>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('update-med', ['id' => $medicamento->id]) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome do Medicamento</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $medicamento->name }}" autofocus>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição do Medicamento</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $medicamento->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="tipo_med" class="form-label">Tipo de Medicamento</label>
                <select class="form-select" id="tipo_med" name="tipo_med">
                    <option selected disabled>Escolha...</option>
                    @foreach ($tipos as $tipo)
                        @if ($medicamento->tipo_med == $tipo->id)
                            <option value="{{ $tipo->id }}" selected>{{ $tipo->tipo }}</option>
                        @else
                            <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="via_med" class="form-label">Via de Administração</label>
                <select class="form-select" id="via_med" name="via_med">
                    <option selected disabled>Escolha...</option>
                    @foreach ($vias as $via)
                        @if ($medicamento->via_med == $via->id)
                            <option value="{{ $via->id }}" selected>{{ $via->via_adm }}</option>
                        @else
                            <option value="{{ $via->id }}">{{ $via->via_adm }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-dark py-3 px-5">Editar</button>
            </div>
        </form>
    </section>

@endsection

