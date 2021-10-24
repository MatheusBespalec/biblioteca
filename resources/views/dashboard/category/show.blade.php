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
        <tr class="table-light">
            <th scope="row">1</th>
            <td>Ação</td>
            <td>10</td>
        </tr>
        </tbody>
    </table>
@endsection
