@extends('layouts.layout')

@section('title', 'MedicineControl - Listagem de Medicamentos')

@section('content')

    <section class="container container-fluid">
        <div class="my-5">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('mes')" />

            <!-- Validation Errors -->
            <x-erro-custom class="mb-4" :erro="session('erro')" />
            
            <div class="d-flex justify-content-center">
                <h2 class="title-page hr-custom">Lista de Medicamentos</h2>
            </div>
            <div class="mt-4 table-responsive">
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col" class="col-5">Descrição</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Via de Administração</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicamentos as $medicamento)
                            <tr>
                                <th scope="row">{{ $medicamento->id }}</th>
                                <td>{{ $medicamento->name }}</td>
                                <td>{{ $medicamento->description }}</td>
                                <td>{{ $tipos_med[$medicamento->tipo_med] }}</td>
                                <td>{{ $vias_med[$medicamento->via_med] }}</td>
                                <td>
                                    <a href="{{ route('editar-med', ['id' => $medicamento->id]) }}">
                                    <i class="far fa-edit" style="color:#353535"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('delete-med', ['id' => $medicamento->id]) }}" >
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
                    {{ $medicamentos->links() }}
                </nav>
            </div>
        </div>
        
    </section>

@endsection