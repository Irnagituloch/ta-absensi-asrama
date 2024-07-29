<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Uid;
use App\Models\User;
use Auth;

class MasterProfilakunController extends Controller
{
    function index(){
        return view('master.profil-akun.index');
    }

    function update(User $user){
        $new = request('password_baru');
        $konfirmasi = request('konfirmasi_password_baru');

        if($konfirmasi == $new){
            $user->nama = request('nama');
            $user->email = request('email');
            $user->password = bcrypt($konfirmasi);
            $user->handleUploadFoto();
            $user->save(); 

            Auth::logout();
            return redirect('login')->with('warning','Silahkan masuk kembali');
        }else{
            return back()->with('warning','Password tidak sama');
        }



    }

}
