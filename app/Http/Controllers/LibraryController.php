<?php

namespace App\Http\Controllers;

use App\Models\Book;

class LibraryController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search) {
            $books = Book::where('title','like','%'.$search.'%')
                ->orWhere('author','like','%'.$search.'%')
                ->orderBy('views','desc')
                ->with('categories')
                ->paginate(9);
        } else {
            $books = Book::orderBy('views','desc')->with('categories')->paginate(9);
        }

        return view('site.index',['page'=>'home','books'=>$books,'search'=>$search]);
    }

    public function about()
    {
        return view('site.about',['page'=>'about']);
    }

    public function show(Book $book)
    {
        $book->views+=1;
        $book->save();

        return view('site.show',['page'=>'','book'=>$book]);
    }
}
