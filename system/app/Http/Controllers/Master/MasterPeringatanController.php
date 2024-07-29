<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\User;
use App\Models\KategoriPeringatan;
use App\Models\Peringatan;

class MasterPeringatanController extends Controller
{
    function index(){
        $data['list_jurusan'] = Jurusan::where('flag_erase',1)->get();
        $data['list_mahasiswi'] = User::where('flag_erase',1)->get();
        $data['list_peringatan'] = Peringatan::all();
        $data['totalPelanggaran'] = Peringatan::count();
        $data['totalPelanggaranBulan'] = Peringatan::whereMonth('created_at',date('m'))->count();
        return view('master.peringatan.index',$data);
    }

    function create(User $mahasiswi){
        $data['detail'] = $mahasiswi;
        $data['list_mahasiswi'] = User::where('flag_erase',1)->get();
        $data['list_kategori'] = KategoriPeringatan::where('flag_erase',1)->get();
        return view('master.peringatan.create',$data);
    }
    function store(Request $request){
        $data = new Peringatan;
        $data->peringatan_user_id = $request->peringatan_user_id;
        $data->peringatan_kategori_id = $request->peringatan_kategori_id;
        $data->peringatan_deskripsi = $request->peringatan_deskripsi;
        $data->save();
        return redirect('master/kirim-peringatan')->with('success','Data peringatan berhasil dibuat');
    }

    function storeKategori(){
        $peringatan = new KategoriPeringatan;
        $peringatan->kategori_peringatan_nama = request('kategori_peringatan_nama');
        $peringatan->save();
        return back()->with('success','Kategori peringatan telah dibuat');
    }

    function destroy(Peringatan $peringatan){
        $peringatan->delete();
        return back()->with('success','Peringatan telah dihappus');

    }

    function destroyKategori(KategoriPeringatan $kategori){
        KategoriPeringatan::where('kategori_peringatan_id',$kategori->kategori_peringatan_id)->update([
            'flag_erase' => 0
        ]);
        return back();
    }

}