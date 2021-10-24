<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function create()
    {
        $user = Auth::user();

        return view('dashboard.books.create',['menu'=>'livros','user'=>$user]);
    }

    public function store(StoreBookRequest $request)
    {
        $user = Auth::user();

        $validated = $request->validated();
        $nomeImagem = 'imagem de teste.jpg';
        $request->input('image',"dale");
        ddd($request->input());

        Book::create($request->all());

        return view('dashboard.books.search',['menu'=>'livros','user'=>$user]);
    }

    public function search()
    {
        $user = Auth::user();

        return view('dashboard.books.search',['menu'=>'livros','user'=>$user]);
    }
}
