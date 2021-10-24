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

        @error('name')
        <p class="fw-bold text-danger mb-0">{{ $message }}</p>
        @enderror
        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInput" value="{{ old('name') }}">
            <label for="floatingInput">Nome</label>
        </div>

        @error('description')
        <p class="fw-bold text-danger mb-0">{{ $message }}</p>
        @enderror
        <div class="form-floating mb-3">
            <textarea class="form-control" name="description" id="floatingTextarea2" style="height: 100px">{{ old('description') }}</textarea>
            <label for="floatingTextarea2">Descrição</label>
        </div>

        @error('author')
        <p class="fw-bold text-danger mb-0">{{ $message }}</p>
        @enderror
        <div class="form-floating mb-3">
            <input type="text" name="author" class="form-control" id="floatingInput" value="{{ old('author') }}">
            <label for="floatingInput">Autor</label>
        </div>

        @error('available')
        <p class="fw-bold text-danger mb-0">{{ $message }}</p>
        @enderror
        <div class="input-group mb-3">
            <label class="input-group-text"  for="inputGroupSelect01">Disponivel para retirar?</label>
            <select class="form-select" name="available" id="inputGroupSelect01">
                <option @if(old('available') !== 1 && old('available') !== 0) selected  @endif disabled>Selecione</option>
                <option @if(old('available') === '1') selected  @endif value="1">Sim</option>
                <option @if(old('available') === '0') selected  @endif value="0">Não</option>
            </select>
        </div>

        <input type="hidden" name="giver_id" value="{{ $user->id }}">
        <button type="submit" class="btn btn-primary">Cadastrar livro</button>
    </form>
@endsection
