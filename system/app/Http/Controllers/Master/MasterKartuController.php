<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Uid;
use App\Models\User;
use App\Models\RfidCard;

class MasterKartuController extends Controller
{
    function index(){
        $data['list_kartu'] = User::where('level',2)->get();
        return view('master.master-data.data-kartu.index',$data);
    }

    function nonAktifkan(RfidCard $rfidcard){
        $rfidcard->flag_erase = 0;
        $rfidcard->save();
        return back()->with('warning','Data kartu telah di Non-Aktifkan');
    }

     function aktifkan(RfidCard $rfidcard){
        $rfidcard->flag_erase = 1;
        $rfidcard->save();
        return back()->with('success','Data kartu telah di Aktifkan');
    }

}
