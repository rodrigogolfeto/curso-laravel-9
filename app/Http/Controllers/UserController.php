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

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){

        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();
        
        // dd($request->only([
        //     'name','email','password'
        // ]));

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        User::create($data);
        return redirect()->route('users.index');

        // $user = User::create($data);
        // return redirect()->route('users.index', $user->id);
        
    }
}
