<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::get('/unauthorized', [AuthController::class, 'unauthorized'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('auth-register');
    Route::post('/login', [AuthController::class, 'login'])->name('auth-login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth-logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('auth-refresh');
    Route::post('/me', [AuthController::class, 'me'])->name('auth-me');
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'kendaraan'
], function ($router) {
    Route::get('stock', [KendaraanController::class, 'jumlahStock'])->name('kendaraan-stock');
    Route::get('stock/list', [KendaraanController::class, 'list'])->name('kendaraan-stock-list');
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'penjualan'
], function ($router) {
    Route::post('create', [PenjualanController::class, 'create'])->name('penjualan-create');
    Route::get('jumlah', [PenjualanController::class, 'jumlahTerjual'])->name('penjualan-jumlah');
    Route::get('list', [PenjualanController::class, 'index'])->name('penjualan-list');
});