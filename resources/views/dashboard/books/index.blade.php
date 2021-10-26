@extends('layouts.dashboard')
@section('title','Buscar Livros')
@section('content')
    <h1>Buscar Livro:</h1>
    <form action="{{ route('dashboard.book.search') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <select class="form-select" name="collumn" id="inputGroupSelect01" style="max-width: 200px">
                <option value="name">Titulo</option>
                <option value="id">Numero</option>
                <option value="author">Autor</option>
                <option value="category">Categoria</option>
            </select>
            <input type="text" name="search" class="form-control" placeholder="Procure..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Procurar</button>
        </div>
    </form>

    @isset($search)
        <h2>Resultados das buscas por {{ $search }}</h2>
    @endisset

    <table class="table ">
        <thead>
            <tr class="table-dark">
                <th scope="col">Numero</th>
                <th scope="col">Capa</th>
                <th scope="col">Livro</th>
                <th scope="col">Author</th>
                <th scope="col">Buscas</th>
                <th scope="col">#</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr class="table-light">
                    <th scope="row">{{ $book->id }}</th>
                    <td><img src="{{ asset('images/books/'.$book->image) }}" alt="{{ $book->name }}"></td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->views }}</td>
                    <td><a class="btn btn-primary btn-sm" href="{{ route('dashboard.book.single',['book'=>$book->id]) }}">Informações</a></td>
                    <td><a class="btn btn-danger btn-sm" href="">Excluir</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
