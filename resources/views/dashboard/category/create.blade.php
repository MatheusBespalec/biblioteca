@extends('layouts.dashboard')
@section('title','Cadastrar Categoria')
@section('content')
    <h1>Cadastrar Categoria:</h1>
    <form action="{{ route('dashboard.category.store') }}" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" name="category" class="form-control" id="floatingInput">
            <label for="floatingInput">Nome</label>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar Categoria</button>
    </form>
@endsection
