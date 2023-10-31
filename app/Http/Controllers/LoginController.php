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
        $user = Auth::User()->nama_lengkap ?? '';
        if (Auth::attempt($validate)){
            $request->session()->regenerate();
            return redirect('/pengguna/index')->with('flash_success', 'Login Berhasil, ' . 'Hallo ' . $user . ' 😊 ');

        }
    }

    public function dashBoardPengguna()
    {
        return view('pengguna.index');
    }
}
