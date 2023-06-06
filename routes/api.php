<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PenjualanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(KendaraanController::class)->group(function () {
    Route::get('kendaraan', 'index');
    Route::get('kendaraan/stock', 'jumlahStock');
    Route::post('kendaraan/create', 'create');
});

Route::controller(PenjualanController::class)->group(function () {
    Route::get('penjualan', 'index');
    Route::get('penjualan/jumlah', 'jumlahTerjual');
    Route::post('penjualan/create', 'create');
});
