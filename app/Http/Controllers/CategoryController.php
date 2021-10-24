<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function show($menu)
    {
        $user = Auth::user();

        return view('dashboard.category.show',['menu'=>$menu,'user'=>$user]);
    }

    public function create($menu)
    {
        $user = Auth::user();

        return view('dashboard.category.create',['menu'=>$menu,'user'=>$user]);
    }
}
