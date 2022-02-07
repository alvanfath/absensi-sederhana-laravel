<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login.login');
    }

    public function postlogin(Request $request){
       if(Auth::attempt($request->only('email','password'))){
           return redirect('home');
       }
       return redirect('/login')->with('error', 'Opss there were some problems with your input.');
    }

    public function logout() {
        Auth::logout();
        return redirect ('/');
    }

}
