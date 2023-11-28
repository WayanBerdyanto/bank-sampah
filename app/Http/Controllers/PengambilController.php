<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Charts\PieChartSampah;



class PengambilController extends Controller
{
    public function index() {
        $user = Auth::User()->nama_lengkap ?? '';
        return view("pengambil.index", ['user'=>$user]);
    }

    public function profilepengambil()
    {
        $username = Auth::User()->username ?? '';
        $user = Auth::User()->username ?? '';
        $result = User::where('username', $username)->first();
        return view('pengambil.profile', ['result' => $result, 'user'=>$user]);
    }

    public function postProfile($id, Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = User::find($id);
            if ($user) {
                if ($request->hasFile('foto')){
                    $foto = $request->file('foto');
                    $fileName = $foto->getClientOriginalName();
                    $foto->move(public_path('img/pengambil'), $fileName);
                    $user->username = $request->username;
                    $user->email = $request->email;
                    $user->foto = $fileName;
                    $user->nama_lengkap = $request->namalengkap;
                    $user->provinsi = $request->provinsi;
                    $user->kabupaten = $request->kabupaten;
                    $user->kecamatan = $request->kecamatan;
                    $user->kelurahan = $request->kelurahan;
                    $user->no_telpon = $request->no_telpon;
                    $user->latitude = $request->latitudeInput;
                    $user->longitude = $request->longitudeInput;
                    if ($user->save()) {
                        return redirect('/pengambil/')->with('success', 'Profile Berhasil Di Ubah');
                    } else {
                        return redirect('/pengambil/profilepengambil')->with('errors', $validator->messages()->all()[0])->withInput();
                    }
                }  
            } 
            else {
                return redirect('/pengambil/profilepengambil')->with('error', 'User Not Found')->with('errors', $validator->messages()->all()[0])->withInput();
            }
    }

    public function ubahpassword()
    {
        $user = Auth::User()->nama_lengkap ?? '';
        return view('banksampah.ubahpassword', ['user'=>$user]);
    }

    public function postubahpassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|different:current_password',
            'confirm_password' => 'required|string|min:8|same:new_password',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            // Update the password with the new one
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect('/pengambil/')->with('success', 'Password berhasil diubah!');
        } else {
            return redirect()->back()->with('error', 'Password saat ini salah.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
