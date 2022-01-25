@extends('layouts.layout')

@section('title', 'MedicineControl - Editar Ministração')

@section('content')

    <section class="container container-fluid pt-3 pb-5 px-4">
        <div class="mt-5 d-flex flex-column justify-content-center align-items-center">
            <h2 class="title-page mb-4">Editar Ministração</h2>
        </div>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('update-ministracao', ['id' => $ministracao->id]) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="med_id" class="form-label">Medicamento</label>
                <select class="form-select" id="med_id" name="med_id" autofocus required>
                    <option selected disabled>Escolha...</option>
                    @foreach ($medicamentos as $medicamento)
                        @if ($ministracao->med_id == $medicamento->id)
                            <option value="{{ $medicamento->id }}" selected>{{ $medicamento->name }}</option>
                        @else
                            <option value="{{ $medicamento->id }}">{{ $medicamento->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="idoso_id" class="form-label">Idoso</label>
                <select class="form-select" id="idoso_id" name="idoso_id" required>
                    <option selected disabled>Escolha...</option>
                    @foreach ($idosos as $idoso)
                        @if ($ministracao->idoso_id == $idoso->id)
                            <option value="{{ $idoso->id }}" selected>{{ $idoso->name }}</option>
                        @else
                            <option value="{{ $idoso->id }}">{{ $idoso->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="frequencia" class="form-label">Frequência</label>
                <textarea class="form-control" id="frequencia" name="frequencia" rows="3" required>{{ $ministracao->frequencia }}</textarea>
                <div id="frequenciadHelp" class="form-text">Frequência em que o idoso deve tomar a medicação</div>
            </div>
            <div class="mb-3">
                <label for="dosagem" class="form-label">Dosagem</label>
                <textarea class="form-control" id="dosagem" name="dosagem" rows="3" required>{{ $ministracao->dosagem }}</textarea>
                <div id="dosagemdHelp" class="form-text">Quantidade a ser tomada</div>
            </div>
            <div class="mb-4">
                <label for="unidades" class="form-label">Unidades do Medicamento</label>
                <input type="number" class="form-control" id="unidades" name="unidades" value="{{ $ministracao->unidades }}" required>
                <div id="unidades_medHelp" class="form-text">Verifique previamente se o medicamento ministrado possui estoque registrado.</div>
            </div>
            <div>
                <button type="submit" class="btn btn-dark py-3 px-5">Editar</button>
            </div>
        </form>
    </section>

@endsection

