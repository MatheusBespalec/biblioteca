@extends('layouts.dashboard')
@section('title','Cadastrar Categoria')
@section('content')
    <h1>Categorias:</h1>
    <table class="table ">
        <thead>
            <tr class="table-dark">
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Livros da Categoria</th>
                @can('delete')
                    <th scope="col">#</th>
                @endcan
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr class="table-light">
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->category }}</td>
                <td>{{ $category->books_count }}</td>
                @can('delete')
                    <td>
                        <form action="{{ route('dashboard.category.delete',['category'=>$category['id']]) }}" method="post">
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
@endsection
