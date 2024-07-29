<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Absensi;
use App\Models\User;
use App\Models\UserDetail;

class MasterController extends Controller
{
    function beranda(){
        $data['totalJurusan'] = Jurusan::where('flag_erase',1)->count();
        $data['totalJurusan'] = Jurusan::where('flag_erase',1)->count();
        $data['totalMahasiswi'] = User::where('flag_erase', 1)->where('level',2)
          ->whereNotNull('rfid')
        ->count();
        $data['totalPelanggaran'] = Absensi::whereTime('absensi_jam', '>', '22:00:00')->count();


        $jurusan =  $data['list_jurusan'] = Jurusan::where('flag_erase',1)->get(); 
        foreach ($jurusan as $item) {
            $total_mahasiswi = UserDetail::where('user_jurusan', $item->jurusan_nama)
            ->count();
            $item->total_mahasiswi = $total_mahasiswi;
        }

        $mahasiswi =  $data['list_mahasiswi'] = User::where('flag_erase',1)->where('level',2)
        ->whereNotNull('rfid')
        ->get(); 
        foreach ($mahasiswi as $item) {
            $total_mahasiswi = Absensi::whereTime('absensi_jam', '>', '22:00:00')->where('absensi_user_id', $item->user_id)
            ->count();
            $item->total_mahasiswi = $total_mahasiswi;
        }

        return view('master.beranda',$data);
    }
}
