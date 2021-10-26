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
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr class="table-light">
                <th scope="row">{{ $category['id'] }}</th>
                <td>{{ $category['category'] }}</td>
                <td>{{ $category['count'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
