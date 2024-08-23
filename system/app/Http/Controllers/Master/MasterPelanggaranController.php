<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Pengaturan;

class MasterPelanggaranController extends Controller
{
    function index(){
       // Fetch the Pengaturan with id = 1
    $pengaturan = Pengaturan::where('id', 1)->first();

    // Check if $pengaturan is null
    if (!$pengaturan) {
        // Handle the case where no record with id = 1 is found
        // You can choose to throw an exception, redirect, or set default values
        // For simplicity, I'll set default values assuming these are time objects or strings
        $pulang = now(); // Example default time
        $masuk = now(); // Example default time
    } else {
        // If $pengaturan is not null, assign values
        $pulang = $pengaturan->jam_pulang;
        $masuk = $pengaturan->jam_masuk;
    }
    
    // Query using $pulang and $masuk values
    $data['list_pelanggaran'] = Absensi::whereTime('absensi_jam', '>', $pulang)
    ->orWhereTime('absensi_jam', '<', $masuk)->get();

    // $data['list_pelanggaran'] = Absensi::where(function($query) use ($pulang, $masuk) {
    //     $query->whereTime('absensi_jam', '>', $pulang)
    //         ->orWhereTime('absensi_jam', '<', $masuk);
    // })->get();

        return view('master.pelanggaran.index',$data);

    }

}
