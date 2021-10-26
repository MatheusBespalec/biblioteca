@extends('layouts.dashboard')
@section('title','Buscar Livros')
@section('content')
    <div class="container">
        <h1>Livro: {{ $book->title }}</h1>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('images/books/'.$book->image) }}" class="img-fluid border border-5" alt="{{ $book->name }}">
            </div>
            <div class="col-md-8 mt-3">
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
                <a href="{{ route('dashboard.book.edit',$book->id) }}" class="btn btn-primary">Editar Livro</a>
                <a href="" class="btn btn-danger">Deletar</a>
            </div>
            <div class="col-12 mt-3">
                <hr>
                <h2>Info:</h2>
                <p><strong>Buscas: </strong>{{ $book->views }}</p>
                <p><strong>Doador do Livro: </strong>{{ $giver->name }} (ID: {{ $giver->id }})</p>
                <p><strong>Cadastro do Livro: </strong>{{ date('d/m/Y', strtotime($book->created_at)) }}</p>
                <hr>
            </div><!--col-12-->
        </div><!--row-->
    </div><!--container-->
@endsection
