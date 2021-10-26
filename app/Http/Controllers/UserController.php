<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $admins =  User::where('hierarchy_level', 3)->get();
        $functionaries = User::where('hierarchy_level', 2)->get();
        $readers = User::where('hierarchy_level', 1)->get();

        return view('dashboard.users.index',[
            'menu'=>'usuarios',
            'user'=>$user,
            'admins'=>$admins,
            'functionaries'=>$functionaries,
            'readers'=>$readers
        ]);
    }

    public function profile()
    {
        $user = Auth::user();

        return view('dashboard.users.profile',['menu'=>'usuarios','user'=>$user]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('dashboard.users.edit',['menu'=>'usuarios','user'=>$user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        User::where('id', $user->id)
            ->update([
                'name'=>$request->name,
                'cpf'=>$request->cpf,
                'phone'=>$request->phone,
                'address'=>$request->address
            ]);

        return redirect()->route('dashboard.profile');
    }
}
