<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $books = Book::paginate(9);

        return view('site.index',['page'=>'home','books'=>$books]);
    }

    public function about()
    {
        return view('site.about',['page'=>'about']);
    }

    public function show(Book $book)
    {
        $book->views+=1;
        $book->save();

        $categories = BookCategory::where('book_id',$book->id)
            ->join('categories','book_categories.category_id','=','categories.id')
            ->get();



        return view('site.show',['page'=>'','book'=>$book,'categories'=>$categories]);
    }
}
