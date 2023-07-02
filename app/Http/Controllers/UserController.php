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
        // return view('users.index');
        dd('users.show',$id);
    }
}
