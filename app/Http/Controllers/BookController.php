<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function create($menu)
    {
        $user = Auth::user();

        return view('dashboard.books.create',['menu'=>$menu,'user'=>$user]);
    }

    public function search($menu)
    {
        $user = Auth::user();

        return view('dashboard.books.search',['menu'=>$menu,'user'=>$user]);
    }
}
