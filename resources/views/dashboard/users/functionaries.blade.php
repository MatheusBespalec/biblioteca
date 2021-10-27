@extends('layouts.dashboard')
@section('title','Cadastrar Categoria')
@section('content')
    <h1>Usuarios:</h1>
    <h2>Funcionarios</h2>
    <table class="table ">
        <thead>
        <tr class="table-dark">
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            @can('update-level')
                <th scope="col">#</th>
            @endcan
            @can('delete')
                <th scope="col">#</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($functionaries as $functionary)
            <tr class="table-info">
                <th scope="row">{{ $functionary->id }}</th>
                <td>{{ $functionary->name }}</td>
                <td>{{ $functionary->email }}</td>
                <td>{{ $functionary->phone }}</td>
                @can('update-level')
                    <td>
                        <form action="{{ route('dashboard.users.up',['user'=>$functionary->id]) }}" method="post">
                            @csrf
                            <button class="btn btn-primary btn-sm" type="submit">Promover</button>
                        </form>
                    </td>
                @endcan
                @can('delete')
                    <td>
                        <form action="{{ route('dashboard.users.delete',['user'=>$functionary->id]) }}" method="post">
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
    {{ $functionaries->links() }}
@endsection
