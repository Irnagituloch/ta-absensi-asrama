<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiSensorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(ApiSensorController::class)->group(function () {
        Route::get('sensor', 'index');
        Route::get('sensor/cek-uid', 'cekUid');
        Route::get('sensor/get-uid', 'getUid');
        Route::post('sensor/save', 'save');
        Route::post('sensor/absensi', 'absensi');
   });
