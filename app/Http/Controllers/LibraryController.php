<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $books = Book::paginate(6);
        return view('site.index',['page'=>'home','books'=>$books]);
    }

    public function about()
    {
        return view('site.about',['page'=>'about']);
    }
}
