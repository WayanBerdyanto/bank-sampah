<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pengguna;

class RegisterController extends Controller
{
    public function register(){
        return view('guest.register');
    }

    public function postRegister(Request $request){
        Pengguna::create([
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'no_telpon'=> $request->no_telpon
        ]);
        return redirect('/')->with('flash_success', 'Register Berhasil');
    }
}
