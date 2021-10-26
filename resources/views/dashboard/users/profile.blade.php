@extends('layouts.dashboard')
@section('title','Cadastrar Categoria')
@section('content')
    <h1>Meu Perfil:</h1>
    <div class="container">
        <div class="user-image mx-auto">
            <i class="fas fa-user"></i>
        </div><!--user-->
        <div class="user-info w-100">
            <hr>
            <p><strong>Nome: </strong>{{ $user->name }}</p>
            <hr>
            <p><strong>E-mail: </strong>{{ $user->email }}</p>
            <hr>
            <p><strong>Telefone: </strong>{{ $user->phone }}</p>
            <hr>
            <p><strong>CPF: </strong>{{ $user->cpf }}</p>
            <hr>
            <p><strong>Endereço: </strong>{{ $user->adress }}</p>
        </div><!--user-info-->
        <a href="{{ route('dashboard.users.edit') }}" class="btn btn-primary">Editar perfil</a>
    </div><!--container-->
@endsection
