<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUser()
    {
        $users = User::all();
        return view('users.list', compact('users'));
    }

    public function showRegisterForm()
    {
        return view('users.register');
    }

    public function registerUser( Request $request)
    {
        $user = new User;
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password=$request->password;
       $user->save();
       return redirect('/users');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }

    public function updateForm($id)
    {
        $data = User::find($id);
        return view('users.update', ['user'=>$data]);
    }

    public function updateUser(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('/users');
    }
}
