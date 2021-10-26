@extends('layouts.dashboard')
@section('title','Emprestimos')
@section('content')
    <h1>Cadastrar Emprestimo:</h1>
    <form action="{{ route('dashboard.loans.store') }}" method="post">
        @csrf

        <div class="input-group">
            <span class="input-group-text" id="basic-addon1">Numero do Leitor</span>
            <input type="text" class="form-control" name="user_id" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        @error('user_id')
            <p class="fw-bold text-danger mb-3">{{ $message }}</p>
        @enderror

        <div class="input-group mt-3">
            <span class="input-group-text" id="basic-addon1">Código do Livro</span>
            <input type="text" class="form-control" name="book_id" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        @error('book_id')
        <p class="fw-bold text-danger mb-3">{{ $message }}</p>
        @enderror

        <hr>
        <p><strong>Data de retirada: </strong>{{ date('d/m/Y') }}</p>
        <p><strong>Data de limite para devolução: </strong>{{ date('d/n/Y', strtotime('+7 days')) }}</p>
        <hr>
        <button class="btn btn-primary" type="submit">Cadastrar Empréstimo</button>
    </form>
@endsection
