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
        </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
                <tr class="table-info">
                    <th scope="row">{{ $admin->id }}</th>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <h2>Funcionarios</h2>
    <table class="table ">
        <thead>
            <tr class="table-dark">
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($functionaries as $functionary)
                <tr class="table-info">
                    <th scope="row">{{ $functionary->id }}</th>
                    <td>{{ $functionary->name }}</td>
                    <td>{{ $functionary->email }}</td>
                    <td>{{ $functionary->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <h2>Leitores</h2>
    <table class="table ">
        <thead>
            <tr class="table-dark">
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($readers as $reader)
                <tr class="table-info">
                    <th scope="row">{{ $reader->id }}</th>
                    <td>{{ $reader->name }}</td>
                    <td>{{ $reader->email }}</td>
                    <td>{{ $reader->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
