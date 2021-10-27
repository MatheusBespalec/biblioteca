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
                <th scope="col">Status</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
        @foreach($openLoans as $loan)
            <tr class="@if($loan->limit_devolution >= date('Y-m-d')) table-warning @else table-danger @endif">
                <th scope="row">{{ $loan->code }}</th>
                <td><img src="/images/books/{{ $loan->image }}" alt="{{ $loan->title }}"></td>
                <td>{{ $loan->title }}</td>
                <td>{{ $loan->name }}</td>
                <td>{{ date('d/m/Y', strtotime($loan->withdraw)) }}</td>
                <td>{{ date('d/m/Y', strtotime($loan->limit_devolution)) }}</td>
                <td>@if($loan->limit_devolution <= time()) No Prazo @else Atrazado @endif</td>
                <td><a href="{{ route('dashboard.loans.update',['loan'=>$loan->code]) }}" class="btn btn-primary">Foi Devolvido</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $openLoans->links() }}
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
            <th scope="col">Limite de Devolução</th>
            <th scope="col">Devolução</th>
        </tr>
        </thead>
        <tbody>
            @foreach($closeLoans as $loan)
                <tr class="table-success">
                    <th scope="row">{{ $loan->code }}</th>
                    <td><img src="/images/books/{{ $loan->image }}" alt="Clean Code"></td>
                    <td>{{ $loan->title }}</td>
                    <td>{{ $loan->name }}</td>
                    <td>{{ date('d/m/Y', strtotime($loan->withdraw)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($loan->limit_devolution)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($loan->devolution)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
