<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;

class MasterJurusanController extends Controller
{
    function index(){
        $data['list_jurusan'] = Jurusan::where('flag_erase',1)->get();
        return view('master.master-data.jurusan.index',$data);
    }

    function store(){
        $item = new Jurusan;
        $item->jurusan_nama = request('jurusan_nama');
        $item->save();
        return back()->with('success','Data Prodi berhasil dibuat');
    }

    function destroy(Jurusan $jurusan){
        $jurusan->flag_erase = 0;
        $jurusan->save();
        return back()->with('warning','Data Prodi berhasil dihapus');
    }
}
