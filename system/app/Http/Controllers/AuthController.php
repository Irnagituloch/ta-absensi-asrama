<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    function login(){
        return view('login');
    }

    function loginProses(Request $request){
        $cek1 = User::where('email', $request->email)->first();
        
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {

            if (Auth::attempt(['email' => request('email'), 'password' => request('password'),'level' => 1])) {
                return redirect('/master/beranda')->with('success', 'Selamat datang '.$cek1->nama);
                

            } elseif(Auth::attempt(['email' => request('email'), 'password' => request('password'),'level' => 2])) {
                return redirect('/mahasiswi/beranda')->with('success', 'Selamat datang '.$cek1->nama);
            }

        } else {
            return back()->with('warning', 'Silahkan periksa Email atau Password');
        }
    }


    function logout(User $user){
        Auth::logout();
        return redirect('login')->with('warning','Berhasil keluar');
    }
}
