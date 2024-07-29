<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Uid;

class MasterCekkartuController extends Controller
{
    function index(){
        return view('master.master-data.cek-kartu.index');
    }

}
