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
            <p><strong>Endereço: </strong>{{ $user->address }}</p>
            <hr>
            <p><strong>Possui empréstimos pendentes? </strong>@if($user->open_loan == 1) Sim @else Não @endif</p>
        </div><!--user-info-->
        <a href="{{ route('dashboard.users.edit') }}" class="btn btn-primary">Editar perfil</a>
        <hr>
        <h2>Minhas Doações:</h2>
        <table class="table ">
            <thead>
            <tr class="table-dark">
                <th scope="col">Numero</th>
                <th scope="col">Capa</th>
                <th scope="col">Livro</th>
                <th scope="col">Author</th>
                <th scope="col">Buscas</th>
                <th scope="col">#</th>
                @can('delete')
                    <th scope="col">#</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($user->books as $book)
                <tr class="table-light">
                    <th scope="row">{{ $book->id }}</th>
                    <td><img src="{{ asset('images/books/'.$book->image) }}" alt="{{ $book->name }}"></td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->views }}</td>
                    <td><a class="btn btn-primary btn-sm" href="{{ route('dashboard.book.single',['book'=>$book->id]) }}">Informações</a></td>
                    @can('delete')
                        <td>
                            <form action="{{ route('dashboard.book.delete',['book'=>$book->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><!--container-->
@endsection
