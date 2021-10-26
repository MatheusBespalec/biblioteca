@extends('layouts.dashboard')
@section('title','Meus Empréstimos')
@section('content')
    <h1>Meus Empréstimos</h1>
    <h2>Pendentes:</h2>
    <table class="table">
        <thead>
        <tr class="table-dark">
            <th scope="col">Numero</th>
            <th scope="col">Capa</th>
            <th scope="col">Livro</th>
            <th scope="col">Retirada</th>
            <th scope="col">Limite de Devolução</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
            @foreach($openLoans as $loan)
                <tr class="table-success">
                    <th scope="row">{{ $loan->id }}</th>
                    <td><img src="/images/books/book-clean-code.jpg" alt="Clean Code"></td>
                    <td>Clean Code</td>
                    <td>{{ date('d/m/Y', strtotime($loan->withdraw)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($loan->limit_devolution)) }}</td>
                    <td>@if($loan->limit_devolution <= time()) No Prazo @else Atrazado @endif</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <h2>Devolvidos:</h2>
    <table class="table">
        <thead>
        <tr class="table-dark">
            <th scope="col">Numero</th>
            <th scope="col">Capa</th>
            <th scope="col">Livro</th>
            <th scope="col">Retirada</th>
            <th scope="col">Limite de Devolução</th>
            <th scope="col">Devolução</th>
        </tr>
        </thead>
        <tbody>
            @foreach($closeLoans as $loan)
                <tr class="table-success">
                    <th scope="row">{{ $loan->id }}</th>
                    <td><img src="/images/books/{{ $loan->image }}" alt="{{ $loan->title }}"></td>
                    <td>{{ $loan->title }}</td>
                    <td>{{ date('d/m/Y', strtotime($loan->withdraw)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($loan->limit_devolution)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($loan->devolution)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
