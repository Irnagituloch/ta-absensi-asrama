<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Uid;
use App\Models\Jurusan;
use App\Models\Absensi;
use App\Models\UserDetail;
use App\Models\RfidCard;

class MasterMahasiswiController extends Controller
{
    function index(){
        $data['list_mahasiswi'] = User::where('flag_erase',1)
        ->where('level',2)
        ->whereNotNull('rfid')
        ->get();
        return view('master.master-data.mahasiswi.index',$data);
    }

    function create(){
        Uid::where('id','>',1)->delete();
        $data['list_jurusan'] = Jurusan::where('flag_erase',1)->get();
        $data['jurusanCount'] = Jurusan::where('flag_erase',1)->count();
        return view('master.master-data.mahasiswi.create',$data);
    }

    function getUid(){
        $id = Uid::max('id');
        $id_count = Uid::count();

        $uid =  Uid::where('id',$id)->first()->uid;
        return $uid;
    }

    function store(Request $request){
        $cek_uid = User::where('rfid', request('rfid'))->count();
        $cek_user = User::where('rfid', request('rfid'))->first();

    // if($cek_uid > 0){
    //     $message = 'RFID Telah digunakan oleh '.$cek_user->nama;
    //     return back()->with('warning',$message);
    // }

        $request->validate([
            'rfid' => 'required',
            'email' => 'unique:user',
        ]);

        $pass_rand = 12345;

        $item = new User;
        $item->nama = request('nama');
        $item->email = request('email');
        $item->rfid = request('rfid');
        $item->password = bcrypt(12345);
        $item->save();

        $itemDetail = new UserDetail;
        $itemDetail->user_id = $item->user_id;
        $itemDetail->user_jurusan = request('user_jurusan');
        $itemDetail->user_alamat = request('user_alamat');
        $itemDetail->user_tgl_masuk = request('user_tgl_masuk');
        $itemDetail->user_notlp_orangtua = request('no_tlp_orangtua');
        $itemDetail->user_notlp = request('user_notlp');
        $itemDetail->user_no_kamar = request('user_no_kamar');
        $itemDetail->user_nama_orangtua = request('user_nama_orangtua');
        $itemDetail->nik = request('nik');
        $itemDetail->nim = request('nim');
        $itemDetail->save();

        $rfid = new RfidCard;
        $rfid->rfid_card_number = request('rfid');
        $rfid->rfid_card_mahasiswi_id = $item->user_id;
        $rfid->save();

        $pesan = $pass_rand.' Adalah Password anda';
        $userkey = 'faf31859267a';
        $passkey = '11wvy1w2xa';
        $telepon =  $itemDetail->user_notlp;
        $message = $pesan;
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
    return redirect('master/master-data/data-mahasiswi')->with('success','Data mahasiswi berhasil dibuat');
    }




function show(User $mahasiswi){
    $data['detail'] = $mahasiswi;
    $data['list_pelanggaran'] = Absensi::where('absensi_user_id',$mahasiswi->user_id)->whereTime('absensi_jam', '>', '22:00:00')->get();
    return view('master.master-data.mahasiswi.show',$data);
}

function edit(User $mahasiswi){
    Uid::where('id','>',0)->delete();
    $data['detail'] = $mahasiswi;
    $data['list_jurusan'] = Jurusan::where('flag_erase',1)->get();
    return view('master.master-data.mahasiswi.edit',$data);
}

function update(User $mahasiswi){
    $mahasiswi->nama = request('nama');
    $mahasiswi->email = request('email');
    $mahasiswi->rfid = request('rfid');
    $mahasiswi->save();

    UserDetail::where('user_id', $mahasiswi->user_id)->update([
        'user_jurusan' => request('user_jurusan'),
        'user_alamat' => request('user_alamat'),
        'user_tgl_masuk' => request('user_tgl_masuk'),
        'user_notlp_orangtua' => request('no_tlp_orangtua'),
        'user_notlp' => request('user_notlp'),
        'user_no_kamar' => request('user_no_kamar'),
        'user_nama_orangtua' => request('user_nama_orangtua'),
        'nik' => request('nik'),
        'nim' => request('nim'),
    ]);
    return back()->with('success','Berhasil diupdate');
}

function destroy(User $mahasiswi){
    $mahasiswi->flag_erase = 0;
    $mahasiswi->rfid = 0;
    $mahasiswi->save();
    return back()->with('warning','Data penghuni asrama berhasil dihapus');
}
}
