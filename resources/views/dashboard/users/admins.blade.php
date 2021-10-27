@extends('layouts.dashboard')
@section('title','Cadastrar Categoria')
@section('content')
    <h1>Usuarios:</h1>
    <h2>Administradores</h2>
    <table class="table ">
        <thead>
        <tr class="table-dark">
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            @can('delete')
                <th scope="col">#</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <tr class="table-info">
                <th scope="row">{{ $admin->id }}</th>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->phone }}</td>
                @can('delete')
                    <td>
                        <form action="{{ route('dashboard.users.delete',['user'=>$admin->id]) }}" method="post">
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
    {{ $admins->links() }}
@endsection
