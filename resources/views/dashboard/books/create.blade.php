@extends('layouts.dashboard')
@section('title','Cadastrar Livro')
@section('content')
    <h1>Cadastrar Livro:</h1>
    <form action="{{ route('dashboard.book.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @error('image')
        <p class="fw-bold text-danger mb-0">{{ $message }}</p>
        @enderror
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Imagem de Capa</label>
            <input type="file" name="image" class="form-control" id="inputGroupFile01">
        </div>

        @error('title')
        <p class="fw-bold text-danger mb-0">{{ $message }}</p>
        @enderror
        <div class="form-floating mb-3">
            <input type="text" name="title" class="form-control" id="floatingInput" value="{{ old('title') }}">
            <label for="floatingInput">Titulo</label>
        </div>

        @error('description')
        <p class="fw-bold text-danger mb-0">{{ $message }}</p>
        @enderror
        <div class="form-floating mb-3">
            <textarea class="form-control" name="description" id="floatingTextarea2" style="height: 100px;overflow: hidden">{{ old('description') }}</textarea>
            <label for="floatingTextarea2">Descrição</label>
        </div>

        @error('author')
        <p class="fw-bold text-danger mb-0">{{ $message }}</p>
        @enderror
        <div class="form-floating mb-3">
            <input type="text" name="author" class="form-control" id="floatingInput" value="{{ old('author') }}">
            <label for="floatingInput">Autor</label>
        </div>

        @error('giver_id')
            <p class="fw-bold text-danger mb-0">{{ $message }}</p>
        @enderror
        <div class="form-floating mb-3">
            <input type="text" name="giver_id" class="form-control" id="floatingInput" value="{{ old('giver_id') }}">
            <label for="floatingInput">ID do Doador</label>
        </div>

        <p class="fw-bold">Selecione as categorias do livro:</p>
        @foreach($categories as $category)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="{{ $category->category }}" name="categories[]" value="{{ $category->id }}">
                <label class="form-check-label" for="{{ $category->category }}">{{ $category->category }}</label>
            </div>
        @endforeach
        <input type="hidden" name="available" value="1">
        <br>
        <button type="submit" class="btn btn-primary mt-2">Cadastrar livro</button>
    </form>
@endsection
