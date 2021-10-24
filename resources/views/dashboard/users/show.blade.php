@extends('layouts.dashboard')
@section('title','Cadastrar Categoria')
@section('content')
    <h1>Meu Perfil:</h1>
    <div class="d-flex">
        <div class="user-image">
            <i class="fas fa-user"></i>
        </div><!--user-->
        <div class="user-info ps-3 w-100">
            <p><strong>Nome: </strong>{{ $user->name }}</p>
            <hr>
            <p><strong>E-mail: </strong>{{ $user->email }}</p>
            <hr>
            <p><strong>Telefone: </strong>(11) 99999-9999</p>
            <hr>
            <p><strong>CPF: </strong>000.000.000-00</p>
        </div><!--user-info-->
    </div><!--d-flex-->
@endsection
