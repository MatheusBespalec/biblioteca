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

        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark menu-dashboard" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-4">Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <button class="btn btn-toggle align-items-center rounded collapsed text-white" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                        <a href="#" class="nav-link @if($menu == 'emprestimos') active" aria-current="page @else link-light @endif ">
                                <i class="fas fa-home"></i> Empréstimos
                        </a>
                    </button>
                </li>
                <div class="collapse" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-5">
                        <li><a href="{{ route('dashboard.loans.my') }}" class="link-light rounded text-decoration-none">Meus empréstimos</a></li>
                        @can('create')
                            <li><a href="{{ route('dashboard.loans.index') }}" class="link-light rounded text-decoration-none">Em Aberto</a></li>
                            <li><a href="{{ route('dashboard.loans.create') }}" class="link-light rounded text-decoration-none">Cadastrar</a></li>
                        @endcan
                    </ul>
                </div>
                @can('create')
                    <li class="nav-item">
                        <button class="btn btn-toggle align-items-center rounded collapsed text-white" data-bs-toggle="collapse" data-bs-target="#book-collapse" aria-expanded="false">
                            <a href="#" class="nav-link @if($menu == 'livros') active" aria-current="page @else link-light @endif ">
                                <i class="fas fa-book-open"></i> Livros
                            </a>
                        </button>
                    </li>
                    <div class="collapse" id="book-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-5">
                            <li><a href="{{ route('dashboard.book.index') }}" class="link-light rounded text-decoration-none">Buscar</a></li>
                            <li><a href="{{ route('dashboard.book.create') }}" class="link-light rounded text-decoration-none">Cadastrar</a></li>
                        </ul>
                    </div>
                    <li class="nav-item">
                        <button class="btn btn-toggle align-items-center rounded collapsed text-white" data-bs-toggle="collapse" data-bs-target="#category-collapse" aria-expanded="false">
                            <a href="#" class="nav-link @if($menu == 'categorias') active" aria-current="page @else link-light @endif ">
                                <i class="fas fa-list"></i> Categorias dos Livros
                            </a>
                        </button>
                    </li>
                    <div class="collapse" id="category-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-5">
                            <li><a href="{{ route('dashboard.category.index') }}" class="link-light rounded text-decoration-none">Todas</a></li>
                            <li><a href="{{ route('dashboard.category.create') }}" class="link-light rounded text-decoration-none">Cadastrar</a></li>
                        </ul>
                    </div>
                    <li class="nav-item">
                        <button class="btn btn-toggle align-items-center rounded collapsed text-white" data-bs-toggle="collapse" data-bs-target="#users-collapse" aria-expanded="false">
                            <a href="#" class="nav-link @if($menu == 'usuarios') active" aria-current="page @else link-light @endif ">
                                <i class="fas fa-users"></i> Usuarios
                            </a>
                        </button>
                    </li>
                    <div class="collapse" id="users-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-5">
                            <li><a href="{{ route('dashboard.users.admins') }}" class="link-light rounded text-decoration-none">Administradores</a></li>
                            <li><a href="{{ route('dashboard.users.functionaries') }}" class="link-light rounded text-decoration-none">Funcionarios</a></li>
                            <li><a href="{{ route('dashboard.users.readers') }}" class="link-light rounded text-decoration-none">Leitores</a></li>
                        </ul>
                    </div>
                @endcan
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user"><i class="fas fa-user"></i></div><!--user-->
                    <strong>{{ $user->name }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="{{ route('dashboard.users.profile') }}">Perfil</a></li>
                    <li><a class="dropdown-item" href="{{ route('dashboard.users.edit') }}">Editar Perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item p-0">
                            <form method="post" action="/logout">
                                @csrf
                                <a class="nav-link link-danger"
                                   aria-current="page"
                                   href="/logout"
                                   onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    Sair
                                </a>
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <section class="dashbord-content p-3">
            @yield('content')
        </section><!--dashboard-content-->
        <div class="clear"></div><!--clear-->

        <!-- Scripts -->
        <!-- BootStrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <!-- FontAwesome -->
        <script src="https://kit.fontawesome.com/4053268ba0.js" crossorigin="anonymous"></script>
    </body>
</html>
