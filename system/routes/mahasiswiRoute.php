<?php

use App\Http\Controllers\Mahasiswi\MahasiswiController;
use Illuminate\Support\Facades\Route;

Route::prefix('mahasiswi')->middleware('auth')->group(function () {

    Route::controller(MahasiswiController::class)->group(function () {
        Route::get('beranda', 'beranda');

        
        Route::get('data-pelanggaran', 'indexPelanggaran');
        Route::get('data-peringatan', 'indexPeringatan');
        Route::get('profil-akun', 'indexProfilAkun');

    });


});
