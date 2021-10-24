<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index($menu)
    {
        $user = Auth::user();

        return view('dashboard.users.index',['menu'=>$menu,'user'=>$user]);
    }

    public function show($menu)
    {
        $user = Auth::user();

        return view('dashboard.users.show',['menu'=>$menu,'user'=>$user]);
    }
}
