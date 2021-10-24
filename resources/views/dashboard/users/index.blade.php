@extends('layouts.dashboard')
@section('title','Cadastrar Categoria')
@section('content')
    <h1>Usuarios:</h1>
    <h2>Administradores</h2>
    <table class="table ">
        <thead>
        <tr class="table-dark">
            <th scope="col">ID</th>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
        </tr>
        </thead>
        <tbody>
        <tr class="table-info">
            <th scope="row">1</th>
            <td></td>
            <td>André</td>
            <td>(11) 99999-9999</td>
        </tr>
        </tbody>
    </table>

    <hr>

    <h2>Funcionarios</h2>
    <table class="table ">
        <thead>
        <tr class="table-dark">
            <th scope="col">ID</th>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
        </tr>
        </thead>
        <tbody>
        <tr class="table-secondary">
            <th scope="row">1</th>
            <td></td>
            <td>André</td>
            <td>(11) 99999-9999</td>
        </tr>
        </tbody>
    </table>

    <hr>

    <h2>Leitores</h2>
    <table class="table ">
        <thead>
        <tr class="table-dark">
            <th scope="col">ID</th>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
        </tr>
        </thead>
        <tbody>
        <tr class="table-light">
            <th scope="row">1</th>
            <td></td>
            <td>André</td>
            <td>(11) 99999-9999</td>
        </tr>
        </tbody>
    </table>
@endsection
