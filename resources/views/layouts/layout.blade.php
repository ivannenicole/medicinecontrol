<!Doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/first-aid-kit.png') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>@yield('title')</title>
</head>
<body>

    <div id="landing" class="landing-page">
        <div class="menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg py-4">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('assets/first-aid-kit.png') }}" alt="logo">Medicine Control</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                            </span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/">Início</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Serviços</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contatos</a>
                                </li>
                                
                                @if (Auth::check())
                                    <li class="nav-item dropdown d-flex align-items-center">
                                        @if(auth()->user()->image)
                                            <img id="profile-image" class="rounded-circle" src="{{ asset('users/profile/' . auth()->user()->image) }}" alt="profile-user">
                                        @endif
                                        <a class="nav-link dropdown-toggle" href="#" id="perfil-user" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            @if(!auth()->user()->image)
                                                <i class="fas fa-user-circle"></i>
                                            @endif
                                            {{ auth()->user()->name }}
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-md-end" aria-labelledby="perfil-user">
                                            <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="fas fa-columns"></i> Dashboard</a></li>
                                            <li><a class="dropdown-item" href="{{ route('perfil') }}"><i class="fas fa-user"></i> Perfil</a></li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a class="dropdown-item" onclick="event.preventDefault();
                                                    this.closest('form').submit();" href="#"><i class="fas fa-sign-out-alt"></i> Sair</a>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        @yield('content')
        <section class="contact">
            <div class="container container-fluid d-flex flex-column justify-content-center align-items-center">
                <div class="contact-content d-flex flex-column justify-content-center align-items-center">
                    <div>
                        <p>medicinecontrol@suporte.com</p>
                    </div>
                    <div>
                        <p>(00) 00000-0000</p>
                    </div>
                    <div class="mt-3">
                        <strong><p>&copy; MedicineControl</p></strong>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @yield('scripts')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/582c5cac37.js" crossorigin="anonymous"></script>
    
</body>
</html>