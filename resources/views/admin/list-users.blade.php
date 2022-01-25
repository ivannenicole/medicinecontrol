@extends('layouts.layout')

@section('title', 'MedicineControl - Listagem de Usuários')

@section('content')

    <section class="container container-fluid">
        <div class="my-5">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('mes')" />

            <div class="d-flex justify-content-center">
                <h2 class="title-page hr-custom">Lista de Usuários</h2>
            </div>
            <div class="mt-4 table-responsive">
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>
                                    @if($user->image)
                                        <img id="profile-image" class="rounded-circle" src="{{ asset('users/profile/' . $user->image) }}" alt="profile-user">
                                    @endif
                                    {{ $user->name }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->description }}</td>
                                <td>
                                    <a href="{{ route('editar-user', ['id' => $user->id]) }}">
                                    <i class="far fa-edit" style="color:#353535"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('delete-user', ['id' => $user->id]) }}" >
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
                    {{ $users->links() }}
                </nav>
            </div>
        </div>
        
    </section>

@endsection