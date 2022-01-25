@extends('layouts.layout')

@section('title', 'MedicineControl - Listagem de Idosos')

@section('content')

    <section class="container container-fluid">
        <div class="my-5">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('mes')" />
            <!-- Validation Errors -->
            <x-erro-custom class="mb-4" :erro="session('erro')" />

            <div class="d-flex justify-content-center">
                <h2 class="title-page hr-custom">Lista de Idosos</h2>
            </div>
            <div class="mt-4 table-responsive">
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Responsável</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($idosos as $idoso)
                            <tr>
                                <th scope="row">{{ $idoso->id }}</th>
                                <td>
                                    @if($idoso->image)
                                        <img id="profile-image" class="rounded-circle" src="{{ asset('users/idosos/' . $idoso->image) }}" alt="profile-idoso">
                                    @endif
                                    {{ $idoso->name }}
                                </td>
                                <td>{{ $idoso->name_resp }}</td>
                                <td>{{ $idoso->telefone }}</td>
                                <td>{{ $idoso->email }}</td>
                                <td>{{ date_format(new DateTime($idoso->data_nasc), 'd/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('editar-idoso', ['id' => $idoso->id]) }}">
                                    <i class="far fa-edit" style="color:#353535"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('delete-idoso', ['id' => $idoso->id]) }}" >
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
                    {{ $idosos->links() }}
                </nav>
            </div>
        </div>
        
    </section>

@endsection