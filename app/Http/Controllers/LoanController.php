<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index($menu)
    {
        $user = Auth::user();

        return view('dashboard.my-loans',['user'=>$user,'menu'=>$menu]);
    }

    public function show($menu)
    {
        $user = Auth::user();

        return view('dashboard.loans',['user'=>$user,'menu'=>$menu]);
    }
}
