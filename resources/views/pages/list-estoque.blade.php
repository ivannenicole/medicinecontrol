@extends('layouts.layout')

@section('title', 'MedicineControl - Estoque')

@section('content')

    <section class="container container-fluid">
        <div class="my-5">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('mes')" />

            <!-- Validation Errors -->
            <x-erro-custom class="mb-4" :erro="session('erro')" />
            
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h2 class="title-page hr-custom">Estoque</h2>
            </div>
            <div class="mt-4 table-responsive">
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Medicamento</th>
                            <th scope="col">Unidades</th>
                            <th scope="col">Peso p/ Unidade</th>
                            <th scope="col">Valor p/ Unidade</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estoques_med as $estoque_med)
                            <tr>
                                <th scope="row">{{ $estoque_med->id }}</th>
                                <td>{{ $meds[$estoque_med->med_id] }}</td>
                                <td>{{ $estoque_med->unidades_med }}</td>
                                <td>{{ $estoque_med->peso_unidade }}</td>
                                <td>{{ $estoque_med->valor_unidade }}</td>
                                <td>
                                    <a href="{{ route('editar-estoque', ['id' => $estoque_med->id]) }}">
                                    <i class="far fa-edit" style="color:#353535"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('delete-estoque', ['id' => $estoque_med->id]) }}" >
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
                    {{ $estoques_med->links() }}
                </nav>
            </div>
        </div>
        
    </section>

@endsection