@extends('layouts.dashboard')
@section('title','Buscar Livros')
@section('content')
    <h1>Buscar Livro:</h1>
    <form>
        <div class="input-group mb-3">
            <select class="form-select" name="collumn" id="inputGroupSelect01" style="max-width: 200px">
                <option value="title">Titulo</option>
                <option value="id">Numero</option>
                <option value="author">Autor</option>
            </select>
            <input type="text" name="search" class="form-control" placeholder="Procure..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Procurar</button>
        </div>
    </form>

    @if($search)
        <h2>Resultados das buscas por {{ $search }}</h2>
    @endif

    <table class="table ">
        <thead>
            <tr class="table-dark">
                <th scope="col">Numero</th>
                <th scope="col">Capa</th>
                <th scope="col">Livro</th>
                <th scope="col">Author</th>
                <th scope="col">Buscas</th>
                <th scope="col">#</th>
                @can('delete')
                    <th scope="col">#</th>
                @endcan
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
                    @can('delete')
                        <td>
                            <form action="{{ route('dashboard.book.delete',['book'=>$book->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $books->links() }}
@endsection
