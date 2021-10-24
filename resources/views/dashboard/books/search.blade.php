@extends('layouts.dashboard')
@section('title','Buscar Livros')
@section('content')
    <h1>Buscar Livro:</h1>
    <form>
        <form action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Busque pelo nome, autor ou id..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Procurar</button>
            </div>
        </form>
    </form>
@endsection
