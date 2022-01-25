@extends('layouts.layout')

@section('title', 'MedicineControl - Form Ministração')

@section('content')

    <div class="container container-fluid py-5 px-4">
        <!-- Validation Errors -->
        <x-erro-custom class="mb-4" :erro="session('erro')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('create-ministracao') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="med_id" class="form-label">Medicamento</label>
                <select class="form-select" id="med_id" name="med_id" autofocus required>
                    <option selected disabled>Escolha...</option>
                    @foreach ($medicamentos as $medicamento)
                        <option value="{{ $medicamento->id }}">{{ $medicamento->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="idoso_id" class="form-label">Idoso</label>
                <select class="form-select" id="idoso_id" name="idoso_id" required>
                    <option selected disabled>Escolha...</option>
                    @foreach ($idosos as $idoso)
                        <option value="{{ $idoso->id }}">{{ $idoso->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="frequencia" class="form-label">Frequência</label>
                <textarea class="form-control" id="frequencia" name="frequencia" rows="3" required></textarea>
                <div id="frequenciadHelp" class="form-text">Frequência em que o idoso deve tomar a medicação</div>
            </div>
            <div class="mb-3">
                <label for="dosagem" class="form-label">Dosagem</label>
                <textarea class="form-control" id="dosagem" name="dosagem" rows="3" required></textarea>
                <div id="dosagemdHelp" class="form-text">Quantidade a ser tomada</div>
            </div>
            <div class="mb-4">
                <label for="unidades" class="form-label">Unidades do Medicamento</label>
                <input type="number" class="form-control" id="unidades" name="unidades" required>
                <div id="unidades_medHelp" class="form-text">Verifique previamente se o medicamento ministrado possui estoque registrado.</div>
            </div>
            <div>
                <button type="submit" class="btn btn-dark py-3 px-5">Cadastrar</button>
            </div>
        </form>
    </div>

@endsection
