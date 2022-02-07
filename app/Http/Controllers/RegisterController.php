<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function index(){
        return view('register.register');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'level' => ['required', 'string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'foto' =>['required', 'file'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function admin(Request $request)
    {

        $validate= $request->validate([
            'name' => 'required',
            'level' => 'required',
            'email' => 'required',
            'password' => 'required',
            'foto' =>'required'
               
        ]);

        $validate['password'] = bcrypt($validate['password']);

        User::create($validate);

        return redirect('register')->with('success', 'Berhasil Menambahkan user baru');
    }
}
