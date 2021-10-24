@extends('layouts.main')

@section('title','Biblioteca Let\'s')
@section('content')
    <section class="banner py-4">
        <div class="container">
            <form>
                <i class="fas fa-book-open"></i>
                <h1 class="display-2">Biblioteca Let's</h1>
                <input
                        class="form-control form-control-lg"
                        type="text"
                        name="search"
                        placeholder="Busque por livros, autores, ou categorias..."
                        aria-label=".form-control-lg example"
                >
            </form>
        </div><!--container-->
    </section><!--banner-->

    <section class="search my-3">
        <div class="container">
            <h2>Titulos mais procurados:</h2>
            <div class="d-flex justify-content-evenly flex-wrap">
            @foreach($books as $book)
                    <div class="card my-3" style="width: 18rem;">
                        <img src="/images/books/{{ $book->image }}" class="card-img-top rounded mx-auto d-block" alt="Clean Code">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->name }}</h5>
                            <p class="card-text">{{ $book->description }}</p>
                        </div><!--card-body-->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Autor: {{ $book->author }}</li>
                        </ul><!--list-group-->
                        <div class="card-body">
                            <a href="#" class="btn btn-primary btn-sm">Ver Livro</a>
                            <a href="#" class="btn btn-secondary btn-sm">Reservar</a>
                        </div><!--card-body-->
                    </div><!--card-->
                @endforeach
            </div><!--row-->
            <nav>
                <ul class="pagination  justify-content-center">
                    <li class="page-item">
                        <span class="page-link">Previous</span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">2</span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div><!--container-->
    </section><!--serach-->
@endsection
