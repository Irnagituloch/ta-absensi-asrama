<?php

namespace App\Http\Controllers\Mahasiswi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peringatan;
use App\Models\Absensi;
use App\Models\Jurusan;
use App\Models\User;
use Auth;
use App\Models\Pengaturan;

class MahasiswiController extends Controller
{
    function beranda(){
     $auth = Auth::user();
     $data['totalJurusan'] = Jurusan::where('flag_erase',1)->count();
     $data['totalJurusan'] = Jurusan::where('flag_erase',1)->count();
     $data['totalMahasiswi'] = User::where('flag_erase', 1)->where('level',2)->count();
     $data['totalPeringatan'] = Peringatan::where('flag_erase', 1)->where('peringatan_user_id',$auth->user_id)->count();
     $data['totalPelanggaran'] = Absensi::whereTime('absensi_jam', '>', '22:00:00')->count();
     return view('mahasiswi.beranda',$data);
 }



 function indexPelanggaran(){
        // buat folder dalam system->resource->view->dlll...
     $auth = Auth::user();
     $pelanggaran = Pengaturan::first();


     $pengaturan = Pengaturan::where('id', 1)->first();

     if (!$pengaturan) {
        $pulang = now();
        $masuk = now();
    } else {
        $pulang = $pengaturan->jam_pulang;
        $masuk = $pengaturan->jam_masuk;
    }
    
    // Query using $pulang and $masuk values
    $data['list_pelanggaran'] = Absensi::where('absensi_user_id',$auth->user_id)->where(function($query) use ($pulang, $masuk) {
        $query->whereTime('absensi_jam', '>', $pulang)
        ->orWhereTime('absensi_jam', '<', $masuk);
    })->get();

    return view('mahasiswi.pelanggaran.index',$data);
} 

function indexPeringatan(){
        // buat folder dalam system->resource->view->dlll...
    $auth = Auth::user();
    $data['list_peringatan'] = Peringatan::where('peringatan_user_id',$auth->user_id)->get();
    return view('mahasiswi.peringatan.index',$data);
}

function indexProfilAkun(){
        // buat folder dalam system->resource->view->dlll...
    return view('mahasiswi.profil-akun.index');
}






}
