@extends('layouts.layout')

@section('title', 'MedicineControl - Ministrações')

@section('content')

    <section class="container container-fluid">
        <div class="my-5">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('mes')" />

            <!-- Validation Errors -->
            <x-erro-custom class="mb-4" :erro="session('erro')" />

            <div class="d-flex justify-content-center">
                <h2 class="title-page hr-custom">Ministrações</h2>
            </div>
            <div class="mt-4 table-responsive">
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Medicamento</th>
                            <th scope="col">Idoso</th>
                            <th scope="col">Frequência</th>
                            <th scope="col">Dosagem</th>
                            <th scope="col">Unidades Medicamento</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ministracoes as $ministracao)
                            <tr>
                                <th scope="row">{{ $ministracao->id }}</th>
                                <td>{{ $meds[$ministracao->med_id] }}</td>
                                <td>{{ $idosos[$ministracao->idoso_id] }}</td>
                                <td>{{ $ministracao->frequencia }}</td>
                                <td>{{ $ministracao->dosagem }}</td>
                                <td>{{ $ministracao->unidades }}</td>
                                <td>
                                    <a href="{{ route('editar-ministracao', ['id' => $ministracao->id]) }}">
                                    <i class="far fa-edit" style="color:#353535"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('delete-ministracao', ['id' => $ministracao->id]) }}" >
                                    <i class="far fa-trash-alt" style="color:#353535"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5 d-flex justify-content-end">
                <nav>
                    {{ $ministracoes->links() }}
                </nav>
            </div>
        </div>
        
    </section>

@endsection