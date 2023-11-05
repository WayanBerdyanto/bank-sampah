<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\User;

class RegisterController extends Controller
{
    public function register(){
        return view('guest.register');
    }

    public function postRegister(Request $request){
        if($request->password == $request->password2){
            User::create([
                'username'=> $request->username,
                'nama_lengkap'=> $request->nama_lengkap,
                'email'=> $request->email,
                'password'=> bcrypt($request->password),
                'no_telpon'=> $request->no_telpon
            ]);
            return redirect('/')->with('flash_success', 'Register Berhasil');
        }
        else{
            return redirect('/register')->with('flash_error', 'Masukan Password Dengan Benar')->withInput();
        }
    }
}
