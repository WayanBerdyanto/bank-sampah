<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;

class LoginController extends Controller
{
    public function login()
    {
        return view('guest.login');
    }

    public function loginPengguna(Request $request)
    {
        $validate = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'pengambil') {
                return redirect('/pengambil/')->with('success', 'Login Berhasil');
            } elseif (Auth::user()->role == 'pengguna') {
                return redirect('/pengguna/')->with('success', 'Login Berhasil');
            } elseif (Auth::user()->role == 'banksampah') {
                return redirect('/banksampah/')->with('success', 'Login Berhasil');
            } 
        }else {
            return redirect('/login')->with('toast_error', 'Username atau password Salah')->withInput();
        }
    }


}
