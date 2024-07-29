<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\User;
use App\Models\Pengaturan;

class MasterPengaturanController extends Controller
{
    function index(){
        $data['pengaturan'] =  Pengaturan::where('id',1)->first();
        $data['list_jurusan'] = Jurusan::where('flag_erase',1)->get();
        $data['list_admin'] = User::where('level',1)->where('flag_erase',1)->get();
        return view('master.pengaturan.index',$data);
    }


    function update(){
        Pengaturan::where('id',1)->update([
            'jam_masuk' => request('jam_masuk'),
            'jam_pulang' => request('jam_pulang'),
        ]);
        return back()->with('success','Berhasil diupdate');
    }

    function store(){
        $user = new User;
        $user->nama = request('nama');
        $user->email = request('email');
        $user->rfid = 0;
        $user->level = 1;
        $user->password =bcrypt(request('password'));
        $user->save();
        return back()->with('success','akun berhasil dibuat');
    }

    function destroy(User $user){
        $user->flag_erase = 0;
        $user->save();
        return back()->with('warning','data berhasil dihapus');
    }


}
