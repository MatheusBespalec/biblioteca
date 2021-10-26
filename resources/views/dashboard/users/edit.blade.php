@extends('layouts.dashboard')
@section('title','Cadastrar Categoria')
@section('content')
    <h1>Informações do Perfil:</h1>
    <form action="{{ route('dashboard.users.update') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nome</span>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">CPF</span>
            <input type="text" name="cpf" class="form-control" value="{{ $user->cpf }}" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Telefone</span>
            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Endereço</span>
            <input type="text" name="address" class="form-control" value="{{ $user->adress }}" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <button class="btn btn-primary" type="submit">Atualizar Perfil</button>
    </form>
@endsection
