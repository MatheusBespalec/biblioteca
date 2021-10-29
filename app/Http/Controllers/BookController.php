<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function index()
    {
        $search = request('search');
        $collumn = request('collumn');
        if ($search) {
            $books = Book::where($collumn,'like','%'.$search.'%')->paginate(20);
        } else {
            $books = Book::paginate(20);
        }
        $user = Auth::user();

        return view('dashboard.books.index',['menu'=>'livros','user'=>$user,'books'=>$books,'search'=>$search]);
    }

    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();

        return view('dashboard.books.create',['menu'=>'livros','user'=>$user,'categories'=>$categories]);
    }

    public function store(StoreBookRequest $request)
    {
        $request->validated();

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/books/'), $imageName);

        $book = $request->all();
        $book['image'] = $imageName;

        $newBook = Book::create($book);
        $newBook->categories()->sync($request->categories);

        return redirect()->route('dashboard.book.index');
    }

    public function show(Book $book)
    {
        $user = Auth::user();

        return view('dashboard.books.single',[
            'menu' => 'livros',
            'user' => $user,
            'book' => $book
        ]);
    }

    public function edit(Book $book)
    {
        $user = Auth::user();
        $categories = Category::all();

        return view('dashboard.books.edit',[
            'menu' => 'livros',
            'user' => $user,
            'book' => $book,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            File::delete(app_path().'\images\books\\'.$book->image);
            $requestImage = $request->image;

            $nameImage = time() . '.' . $requestImage->extension();
            $requestImage->move(public_path('images/books/'), $nameImage);

            $data['image'] = $nameImage;
        }

        $book->update($data);

        if (is_array($request->categories)) {
            $book->categories()->sync($request->categories);
        }

        return redirect()->route('dashboard.book.single');
    }

    public function delete(Book $book)
    {
        File::delete(app_path().'\images\books\\'.$book->image);
        $book->loans()->delete();
        $book->categories()->detach();
        $book->delete();

        return redirect()->route('dashboard.book.single');
    }
}
