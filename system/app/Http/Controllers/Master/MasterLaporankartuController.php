<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;

class MasterLaporankartuController extends Controller
{
    function indexRusak(){
        $data['list_jurusan'] = Jurusan::where('flag_erase',1)->get();
        return view('master.laporan-kartu.index',$data);
    }

    function indexBaik(){
        $data['list_jurusan'] = Jurusan::where('flag_erase',1)->get();
        return view('master.laporan-kartu.index',$data);
    }

}
