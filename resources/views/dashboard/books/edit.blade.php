@extends('layouts.dashboard')
@section('title','Cadastrar Livro')
@section('content')
    <h1>Cadastrar Livro:</h1>
    <form action="{{ route('dashboard.book.update',['id'=>$book->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Imagem de Capa Atual</h3>
            <img src="{{ asset('images/books/'.$book->image) }}" class="small-img rounded" alt="{{ $book->name }}">
            <figcaption class="figure-caption">*Selecione outra imagem apenas se quiser alterar a atual.</figcaption>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Imagem de Capa</label>
            <input type="file" name="image" class="form-control" id="inputGroupFile01">
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="title" class="form-control" id="floatingInput" value="{{ $book->name }}">
            <label for="floatingInput">Titulo</label>
        </div>

        <div class="form-floating mb-3">
            <textarea class="form-control" name="description" id="floatingTextarea2" style="height: 100px">{{ $book->description }}</textarea>
            <label for="floatingTextarea2">Descrição</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="author" class="form-control" id="floatingInput" value="{{ $book->author }}">
            <label for="floatingInput">Autor</label>
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text"  for="inputGroupSelect01">Disponivel para retirar?</label>
            <select class="form-select" name="available" id="inputGroupSelect01">
                <option @if($book->available !== 1 && $book->available !== 0) selected  @endif disabled>Selecione</option>
                <option @if($book->available === '1') selected  @endif value="1">Sim</option>
                <option @if($book->available === '0') selected  @endif value="0">Não</option>
            </select>
        </div>

        <p class="fw-bold mb-0">Selecione as categorias do livro:</p>
        <span>
            *Marque apenas se quiser editar as atuais(
            @foreach($bookCategories as $category)
                @if($loop->last)
                    {{ $category->category }} )
                @else
                    {{ $category->category }},
                @endif
            @endforeach
        </span>
        <br>
        @foreach($categories as $category)
            <div class="form-check form-check-inline mt-3">
                <input class="form-check-input" type="checkbox" id="{{ $category->category }}" name="categories[]" value="{{ $category->id }}">
                <label class="form-check-label" for="{{ $category->category }}">{{ $category->category }}</label>
            </div>
        @endforeach
        <br>
        <button type="submit" class="btn btn-primary mt-2">Atualizar livro</button>
    </form>
@endsection
