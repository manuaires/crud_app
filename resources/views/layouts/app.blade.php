<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GameWiki</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}"></head>
<body>   
     <nav class="navbar navbar-expand-lg">
            <div class="container">
            <a class="navbar-brand" href="{{ URL('/') }}">GameWiki <i class="bi bi-controller"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('products')) ? 'active' : '' }}" href="{{ route('products.index') }}">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('games')) ? 'active' : '' }}" href="{{ route('games.index') }}">Games</a>
                        </li>
                         <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-2"></i> Usuário
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('register') }}">Registre-se</a>
                                </li>
                            </ul>
                        </li>   
                    @else
                         <li class="nav-item">
                            <a class="nav-link {{ (request()->is('products')) ? 'active' : '' }}" href="{{ route('products.index') }}">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('games')) ? 'active' : '' }}" href="{{ route('games.index') }}">Games</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                >Logout <i class="bi bi-box-arrow-right"></i></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                            </ul>
                        </li>
                    @endguest
                            </ul>
                </div>
            </div>
        </nav>    
    <div class="container">
            @yield('content')
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>