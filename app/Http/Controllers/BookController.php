<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(20);
        $user = Auth::user();

        return view('dashboard.books.index',['menu'=>'livros','user'=>$user,'books'=>$books]);
    }

    public function search(Request $request)
    {
        if ($request->collumn == 'category') {
            $category = Category::where('category','like','%'.$request->search.'%')->first();
            $books = Book::where('book_categories.category_id','=',$category->id)
                ->join('book_categories','books.id','=','book_categories.book_id')
                ->paginate(20);
        } else {
            $books = Book::where($request->collumn,'like','%'.$request->search.'%')->paginate(20);
        }

        $user = Auth::user();

        return view('dashboard.books.index',[
            'menu'   => 'livros',
            'user'   => $user,
            'books'  => $books,
            'search' => $request->search,
        ]);
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
        foreach ($request->categories as $singleCategory) {
            $category = new BookCategory();

            $category->book_id = $newBook->id;
            $category->category_id = $singleCategory;

            $category->save();
        }

        return redirect()->route('dashboard.book.index');
    }

    public function show(Book $book)
    {
        $user = Auth::user();
        $giver = User::where('id',$book->giver_id)->first();
        $categories = BookCategory::where('book_id',$book->id)
            ->join('categories','book_categories.category_id','=','categories.id')
            ->get();

        return view('dashboard.books.single',[
            'menu'       => 'livros',
            'user'       => $user,
            'book'       => $book,
            'giver'      => $giver,
            'categories' => $categories
        ]);
    }

    public function edit(Book $book)
    {
        $user = Auth::user();
        $bookCategories = BookCategory::where('book_id',$book->id)
            ->join('categories','book_categories.category_id','=','categories.id')
            ->get();
        $categories = Category::all();

        return view('dashboard.books.edit',[
            'menu' => 'livros',
            'user' => $user,
            'book' => $book,
            'categories' => $categories,
            'bookCategories' => $bookCategories
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $nameImage = time() . '.' . $requestImage->extension();

            $requestImage->move(public_path('images/books/'), $nameImage);

            $data['image'] = $nameImage;
        }

        Book::findOrFail($id)->update($data);
        if (is_array($request->categories)) {
            $this->uptadeBookCategories($id,$request->categories);
        }

        return redirect()->route('dashboard.book.single',['book'=>$id]);
    }

    public function delete(Book $book)
    {
        $book->delete();

        return redirect()->route('dashboard.book.index');
    }

    private function uptadeBookCategories($book_id,$categories)
    {
        BookCategory::where('book_id', $book_id)->delete();

        foreach ($categories as $singleCategory) {
            $category = new BookCategory();

            $category->book_id = $book_id;
            $category->category_id = $singleCategory;

            $category->save();
        }
    }
}
