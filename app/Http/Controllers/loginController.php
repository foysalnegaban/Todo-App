<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class loginController extends Controller
{
    function login(){
        return view('auth.login');
    }
    function loginPost(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $credential = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        $user = User::where(['email'=>$request->email])->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                if(Auth::attempt($credential)){
                return redirect()->route('home');
                }
                
            }
           
        }
        
    }

}
