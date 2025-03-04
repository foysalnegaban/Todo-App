<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class registerController extends Controller
{
    function register(){
        return view('auth.register');
    }

    function Postregister(Request $request){
        $this->validate($request,[
            'name'=> 'required|string',
            'email'=> 'required|email',
            'password'=> 'required|same:password',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login');
    }
}
