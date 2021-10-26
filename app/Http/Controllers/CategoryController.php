<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categoriesRaw = Category::all();
        $categories = [];

        foreach ($categoriesRaw as $category){
            static $count = 0;

            $categories[$count] = [
                'id' => $category->id,
                'category' => $category->category,
                'count' => BookCategory::where('category_id',$category->id)->count()
            ];

            $count++;
        }

        return view('dashboard.category.index',['menu'=>'categorias','user'=>$user,'categories'=>$categories]);
    }

    public function create()
    {
        $user = Auth::user();

        return view('dashboard.category.create',['menu'=>'categorias','user'=>$user]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        Category::create($request->all());


        return redirect()->route('dashboard.category.index')->with(['menu'=>'categorias','user'=>$user]);
    }
}
