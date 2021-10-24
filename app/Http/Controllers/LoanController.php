<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('dashboard.my-loans',['user'=>$user,'menu'=>'painel']);
    }

    public function show()
    {
        $user = Auth::user();

        return view('dashboard.loans',['user'=>$user,'menu'=>'painel']);
    }
}
