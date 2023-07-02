<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::get();

        // return view('users.index',['users' => $users]);
        return view('users.index',compact('users'));
    }

    public function show($id){
        // $user = User::where('id',$id)->get()->first();
        // $user = User::find($id);

        if(!$user = User::find($id))
            // return redirect()->back();
            return redirect()->route('users.index');
        
        return view('users.show',compact('user'));
    }
}
