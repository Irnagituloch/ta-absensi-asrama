<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Uid;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Absensi;
use App\Models\Pengaturan;

class ApiSensorController extends Controller
{
    public function index()
    {

        $uid = Uid::all();
        return response()->json([
            'data' => $uid,
            'message' => 'Fetch all posts',
            'success' => true
        ]);
    }

    function cekUid(){
     $id = Uid::max('id');
     $uid =  Uid::where('id',$id)->first()->uid;
     $data = User::where('rfid', $uid)->first();

     return response()->json([
        'data' => $data->uid,
        'message' => 'Fetch all posts',
        'success' => true
    ]);
 }


 function getUid(){
    $data = User::where('flag_erase', 1)->get(['rfid','nama']);

    return response()->json([
        'data' => $data,
        'message' => 'Data UID Mahasiswi',
        'success' => true
    ]);
}


public function save(Request $request)
{
    $uid = trim($request->uid); 
    $count = Uid::count();
    if($count > 0){
      $data =  Uid::where('id',1)->update([
        "uid" => $uid,
    ]);
  }else{
    $uid = new Uid;
    $uid->id = 1;
    $uid->uid = trim($request->uid); 
    $uid->save();
}


return response()->json(['status' => 'success']);
}


function absensi(Request $request){
    $uid = trim($request->uid); 
    $userId =  User::where('rfid',$uid)->first();
    $detail = UserDetail::where('user_id',$userId->user_id)->first();
    $absensi = new Absensi;
    $absensi->absensi_rfid = $uid;
    $absensi->absensi_user_id = $userId->user_id;
    $absensi->absensi_jam = date('H:i:s');
    $absensi->absensi_tanggal = date('d');
    $absensi->absensi_bulan = date('n');
    $absensi->absensi_tahun = date('Y');
    $absensi->save();

    $now = date('H:i:s');
    $pengaturan = Pengaturan::where('id', 1)->first();

    if (!$pengaturan) {
        $pulang = now();
        $masuk = now();
    } else {
        $pulang = $pengaturan->jam_pulang;
        $masuk = $pengaturan->jam_masuk;
    }
    

     if ($now > $pulang) {
     $pesan = 'Bapak/Ibu '.  $detail->user_nama_orangtua .
    ', Putri Anda, *'. $userId->nama .'*, terlambat pulang, tiba pukul *'. date('H:i:s'). '*. Melebihi batas waktu yang ditentukan yaitu pukul '.$pengaturan->jam_pulang.'.  Mohon diingatkan untuk mematuhi aturan. Terima kasih. Tim pengelola Asrama POLITAP';

    $userkey = 'faf31859267a';
    $passkey = '11wvy1w2xa';
    $telepon = $detail->user_notlp_orangtua;
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
   }

    return response()->json([
        'data' => $uid,
        'message' => 'Data UID Absensi',
        'success' => true
    ]);
    
}
}
