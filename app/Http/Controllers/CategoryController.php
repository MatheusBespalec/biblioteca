<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::withCount('books')->get();

        return view('dashboard.category.index',['menu'=>'categorias','user'=>$user,'categories'=>$categories]);
    }

    public function create()
    {
        $user = Auth::user();

        return view('dashboard.category.create',['menu'=>'categorias','user'=>$user]);
    }

    public function store(Request $request)
    {
        Category::create($request->all());

        return redirect()->route('dashboard.category.index');
    }

    public function delete(Category $category)
    {
        $$category->books()->detach();
        $category->delete();

        return back();
    }
}
