@extends('layouts.main')

@section('title','Biblioteca Let\'s')
@section('content')
    <div class="container py-4">
        <h1>Livro: {{ $book->title }}</h1>
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('images/books/'.$book->image) }}" class="img-fluid border border-5 d-block mx-auto" alt="{{ $book->title }}">
            </div>
            <div class="col-md-12 mt-3">
                <hr>
                <p><strong>Titulo: </strong>{{ $book->title }}</p>
                <hr>
                <p><strong>Author: </strong>{{ $book->author }}</p>
                <hr>
                <p><strong>Descrição: </strong>{{ $book->description }}</p>
                <hr>
                <p><strong>Categorias: </strong>
                    @foreach($categories as $category)
                        @if($loop->last)
                            {{ $category->category }}.
                        @else
                            {{ $category->category }},
                        @endif
                    @endforeach
                </p>
                <hr>
                <p><strong>Disponivel para empréstimo: </strong>@if($book->availabe == 1) Sim @else Não @endif</p>
                <hr>
                @auth
                    <a href="{{ route('dashboard.book.edit',$book->id) }}" class="btn btn-secondary">Reservar Livro</a>
                @endauth
            </div>
        </div><!--row-->
    </div><!--container-->
@endsection
