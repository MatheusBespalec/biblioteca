@extends('layouts.dashboard')
@section('title','Emprestimos')
@section('content')
    <h1>Emprestimos</h1>
    <h2>Buscar por emprestimos:</h2>
    <form action="">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Numero do emprestimo..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
        </div>
    </form>
    <hr>

    <h2>Pendentes:</h2>
    <table class="table ">
        <thead>
        <tr class="table-dark">
            <th scope="col">Numero</th>
            <th scope="col">Capa</th>
            <th scope="col">Livro</th>
            <th scope="col">Leitor</th>
            <th scope="col">Retirada</th>
            <th scope="col">Limite de Devolução</th>
            <th scope="col">#</th>
        </tr>
        </thead>
        <tbody>
        <tr class="table-danger">
            <th scope="row">1</th>
            <td><img src="/images/books/book-clean-code.jpg" alt="Clean Code"></td>
            <td>Clean Code</td>
            <td>Matheus Bespalec</td>
            <td>17/05/2021</td>
            <td>24/05/2021</td>
            <td>Atrazado</td>
        </tr>
        </tbody>
    </table>

    <hr>

    <h2>Ultimas Devoluções:</h2>
    <table class="table ">
        <thead>
        <tr class="table-dark">
            <th scope="col">Numero</th>
            <th scope="col">Capa</th>
            <th scope="col">Livro</th>
            <th scope="col">Cliente</th>
            <th scope="col">Retirada</th>
            <th scope="col">Data de Devolução</th>
        </tr>
        </thead>
        <tbody>
        <tr class="table-success">
            <th scope="row">1</th>
            <td><img src="/images/books/book-clean-code.jpg" alt="Clean Code"></td>
            <td>Clean Code</td>
            <td>Matheus Bespalec</td>
            <td>17/05/2021</td>
            <td>24/05/2021</td>
        </tr>
        </tbody>
    </table>
@endsection
