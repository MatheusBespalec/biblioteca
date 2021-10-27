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
                        placeholder="Busque por livros ou autores..."
                        aria-label=".form-control-lg example"
                >
            </form>
        </div><!--container-->
    </section><!--banner-->

    <section class="search my-3">
        <div class="container">
            @if($search == null)
                <h2>Titulos mais procurados:</h2>
            @else
                <h2>Resuldados das busca por "{{ $search }}":</h2>
            @endif
            <div class="d-flex justify-content-evenly flex-wrap">
            @foreach($books as $book)
                    <div class="card my-3" style="width: 18rem;">
                        <img src="/images/books/{{ $book->image }}" class="card-img-top rounded mx-auto d-block" alt="Clean Code">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ $book->description }}</p>
                        </div><!--card-body-->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Autor: {{ $book->author }}</li>
                        </ul><!--list-group-->
                        <div class="card-body">
                            <a href="{{ route('library.show',['book'=>$book->id]) }}" class="btn btn-primary btn-sm">Ver Livro</a>
                            @auth
                                <a href="#" class="btn btn-secondary btn-sm">Reservar</a>
                            @endauth
                        </div><!--card-body-->
                    </div><!--card-->
                @endforeach
            </div><!--row-->
            <div class="d-flex justify-content-center">
                {{ $books->links() }}
            </div>
        </div><!--container-->
    </section><!--serach-->
@endsection
