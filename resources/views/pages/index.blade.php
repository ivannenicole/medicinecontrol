@extends('layouts.layout')

@section('title', 'MedicineControl')

@section('content')

    <section id="intro">
        <div class="container home d-flex flex-column justify-content-center align-content-center align-items-center px-2 py-4">
            <div class="body-home d-flex flex-column justify-content-center align-items-center">
                <div class="d-flex justify-content-center">
                    <h1>Sistema MedicineControl</h1>
                </div>
                <div>
                    <p>
                        O MedicineControl é um site desenvolvido para facilitar o trabalho de instituições que cuidam
                        de pessoas que necessitam tomar remédios diariamente. Ao se cadastrar em nosso sistema você
                        poderá registrar todos os seus pacientes, os remédios que eles fazem uso, entre outras informações.
                        Não perca tempo! Nosso serviço é totalmente gratuito!
                    </p>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a class="btn btn-dark py-3 px-5" href="{{ route('register') }}">Cadastre-se</a>
                </div>
            </div>
        </div>
    </section>
    
@endsection

@section('scripts')
    <script>
        document.getElementById('landing').classList.add('extra');
    </script>
@endsection
