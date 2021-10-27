<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function admins()
    {
        $user = Auth::user();

        $admins =  User::where('hierarchy_level', 3)->paginate(20);

        return view('dashboard.users.admins',[
            'menu'=>'usuarios',
            'user'=>$user,
            'admins'=>$admins
        ]);
    }

    public function functionaries()
    {
        $user = Auth::user();

        $functionaries = User::where('hierarchy_level', 2)->paginate(20);

        return view('dashboard.users.functionaries',[
            'menu'=>'usuarios',
            'user'=>$user,
            'functionaries'=>$functionaries
        ]);
    }

    public function readers()
    {
        $user = Auth::user();

        $readers = User::where('hierarchy_level', 1)->paginate(20);

        return view('dashboard.users.readers',[
            'menu'=>'usuarios',
            'user'=>$user,
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

        return redirect()->route('dashboard.users.profile');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard.users');
    }

    public function levelUp(User $user)
    {
        if ($user->hierarchy_level < 3) {
            $user->hierarchy_level+= 1;
            $user->save();
        }

        return redirect()->route('dashboard.users');
    }
}
