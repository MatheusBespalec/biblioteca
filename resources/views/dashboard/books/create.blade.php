@extends('layouts.dashboard')
@section('title','Cadastrar Livro')
@section('content')
    <h1>Cadastrar Livro:</h1>
    <form action="" method="post">
        @csrf
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Imagem de Capa</label>
            <input type="file" name="image" class="form-control" id="inputGroupFile01">
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInput">
            <label for="floatingInput">Nome</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" name="description" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Descrição</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="author" class="form-control" id="floatingInput">
            <label for="floatingInput">Autor</label>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Disponivel para retirar?</label>
            <select class="form-select" id="inputGroupSelect01">
                <option selected disabled>Selecione</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
        </div>
        <input type="hidden" name="giver_id" value="{{ $user->id }}">
        <button type="submit" class="btn btn-primary">Cadastrar livro</button>
    </form>
@endsection
