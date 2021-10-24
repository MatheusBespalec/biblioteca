@extends('layouts.dashboard')
@section('title','Meus Empréstimos')
@section('content')
    <h1>Meus Empréstimos</h1>
    <h2>Pendentes:</h2>
    <table class="table ">
        <thead>
        <tr class="table-dark">
            <th scope="col">Numero</th>
            <th scope="col">Capa</th>
            <th scope="col">Livro</th>
            <th scope="col">Retirada</th>
            <th scope="col">Limite de Devolução</th>
        </tr>
        </thead>
        <tbody>
        <tr class="table-warning">
            <th scope="row">1</th>
            <td><img src="/images/books/book-clean-code.jpg" alt="Clean Code"></td>
            <td>Clean Code</td>
            <td>17/05/2021</td>
            <td>24/05/2021</td>
        </tr>
        </tbody>
    </table>

    <hr>

    <h2>Devolvidos:</h2>
    <table class="table ">
        <thead>
        <tr class="table-dark">
            <th scope="col">Numero</th>
            <th scope="col">Capa</th>
            <th scope="col">Livro</th>
            <th scope="col">Retirada</th>
            <th scope="col">Limite de Devolução</th>
        </tr>
        </thead>
        <tbody>
        <tr class="table-light">
            <th scope="row">1</th>
            <td><img src="/images/books/book-clean-code.jpg" alt="Clean Code"></td>
            <td>Clean Code</td>
            <td>17/05/2021</td>
            <td>24/05/2021</td>
        </tr>
        </tbody>
    </table>
@endsection
