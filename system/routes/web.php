<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;

use App\Http\Controllers\Master\MasterController;
use App\Http\Controllers\Master\MasterJurusanController;
use App\Http\Controllers\Master\MasterMahasiswiController;
use App\Http\Controllers\Master\MasterPeringatanController;
use App\Http\Controllers\Master\MasterLaporankartuController;
use App\Http\Controllers\Master\MasterCekkartuController;
use App\Http\Controllers\Master\MasterKartuController;
use App\Http\Controllers\Master\MasterProfilakunController;
use App\Http\Controllers\Master\MasterPengaturanController;
use App\Http\Controllers\Master\MasterPelanggaranController;



use App\Http\Controllers\Mahasiswi\MahasiswiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::controller(IndexController::class)->group(function () {
//     Route::get('/', 'base');
// });

Route::controller(AuthController::class)->group(function () {
  Route::get('/', 'login')->name('login');
  Route::get('login', 'login')->name('login');
  Route::post('login', 'loginProses');
  Route::get('logout', 'logout');
});

// MEMBER=====================================================================
Route::prefix('master')->middleware('auth')->group(function () {

  Route::controller(MasterController::class)->group(function () {
    Route::get('beranda', 'beranda');
  });

  Route::controller(MasterPeringatanController::class)->group(function () {
    Route::get('kirim-peringatan', 'index');
    Route::get('kirim-peringatan/create', 'create');
    Route::get('kirim-peringatan/{peringatan}/delete', 'destroy');
    Route::post('kirim-peringatan/create', 'store');
    Route::post('kirim-peringatan/create-kategori', 'storeKategori');
    Route::get('kirim-peringatan/{kategori}/delete-kategori', 'destroyKategori');
  });

  Route::controller(MasterLaporankartuController::class)->group(function () {
    Route::get('laporan/kartu-rusak', 'indexRusak');
    Route::get('laporan/kartu-baik', 'indexBaik');
  });


  Route::prefix('master-data')->group(function () {

    Route::controller(MasterJurusanController::class)->group(function () {
      Route::get('data-jurusan', 'index');
      Route::post('data-jurusan/create', 'store');
      Route::get('data-jurusan/{jurusan}/hapus', 'destroy');
    });

    Route::controller(MasterMahasiswiController::class)->group(function () {
      Route::get('data-mahasiswi', 'index');
      Route::get('data-mahasiswi/{mahasiswi}/detail', 'show');
      Route::get('data-mahasiswi/{mahasiswi}/edit', 'edit');
      Route::put('data-mahasiswi/{mahasiswi}/update', 'update');
      Route::get('data-mahasiswi/get-uid', 'getUid');
      Route::get('data-mahasiswi/create', 'create');
      Route::post('data-mahasiswi/create', 'store');
      Route::get('data-mahasiswi/{mahasiswi}/hapus', 'destroy');
    });

    Route::controller(MasterCekkartuController::class)->group(function () {
      Route::get('cek-kartu', 'index');
    });

    Route::controller(MasterKartuController::class)->group(function () {
      Route::get('data-kartu', 'index');
      Route::get('data-kartu/{rfidcard}/aktifkan', 'aktifkan');
      Route::get('data-kartu/{rfidcard}/non-aktifkan', 'nonAktifkan');
    });



  });
  Route::controller(MasterProfilakunController::class)->group(function () {
    Route::get('profil-akun', 'index');
    Route::put('profil-akun/{user}/update', 'update');
  });

   Route::controller(MasterPelanggaranController::class)->group(function () {
    Route::get('pelanggaran', 'index');
  });

  Route::controller(MasterPengaturanController::class)->group(function () {
    Route::get('pengaturan', 'index');
    Route::post('pengaturan/update', 'update');
    Route::post('pengaturan/create-akun', 'store');
    Route::get('pengaturan/{user}/delete', 'destroy');
  });


});

include 'mahasiswiRoute.php';