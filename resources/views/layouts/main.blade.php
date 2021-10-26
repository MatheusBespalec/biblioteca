<!doctype html>
<html lang="pt-br">
    <head>
        <!--  Meta Tags -->
            <!-- Lang -->
            <meta charset="utf-8">
            <!-- Responsive -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Author -->
            <meta name="author" content="Matheus Bespalec | matheusbespalec@gmail.com">
        <!-- -->

        <!-- Title -->
        <title>@yield('title')</title>
        <!-- Style -->
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <!-- CSS -->
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- -->
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('library.home') }}"><i class="fas fa-book-open"></i> Let's</a>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @if($page == 'home') active" aria-current="page @endif " href="{{ route('library.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($page == 'about') active" aria-current="page @endif " href="{{ route('library.about') }}">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Visitar</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('dashboard.loans.my') }}">Meus Empréstimos</a>
                            </li>
                            <li class="nav-item">
                                <form method="post" action="/logout">
                                    @csrf
                                    <a class="nav-link"
                                       aria-current="page"
                                       href="/logout"
                                       onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        Sair
                                    </a>
                                </form>
                            </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Registrar</a>
                        </li>
                        @endguest
                    </ul><!--navbar-nav-->
                </div><!--navbar-collapse-->
            </div><!--container-->
        </nav><!--navbar-->

        @yield('content')

        <footer class="bg-dark py-4">
            <div class="container">
                <small class="d-block text-center">&copy; 2021 - Biblioteca Let's </small>
            </div><!--container-->
        </footer><!--border-top-->

        <!-- Scripts -->
            <!-- BootStrap -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            <!-- FontAwesome -->
            <script src="https://kit.fontawesome.com/4053268ba0.js" crossorigin="anonymous"></script>
    </body>
</html>
