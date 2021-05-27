<?php

namespace App\Http\Controllers;

use Database\Seeders\CustomerTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;

class UserController extends Controller
{
    public function index()
    {
//        $users = DB::table('customers')->paginate(10)->reverse();
        $users = DB::table('customers')->paginate(10);
        return view('user.list', compact('users'));
    }

    public function showCreateForm()
    {
        return view('user.create');
    }

    public function createUser(Request $request)
    {
        $user = [
            'name'=>$request->name,
            'dob'=>$request->dob,
            'email'=>$request->email
        ];
       DB::table('customers')->insert($user);
       return redirect()->route('user.list');
    }

    public function deleteUser($id)
    {
        DB::table('customers')->where('id', $id)->delete();
//        DB::table('customers')->delete($id);
        return redirect()->route('user.list');
    }

    public function showUpdateForm($id)
    {
        $user = DB::table('customers')->where('id','=',$id)->get();
        return view('user.update',compact('user'));
    }

    public function updateUser(Request $request)
    {
        DB::table('customers')->where('id',$request['id'])->update([
            'name'=> $request['name'],
            'dob'=>$request['dob'],
            'email'=>$request['email']
        ]);
        return redirect()->route('user.list');
    }
}
