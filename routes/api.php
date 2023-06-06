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
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::get('/unauthorized', [AuthController::class, 'unauthorized'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'kendaraan'
], function ($router) {
    Route::get('list', [KendaraanController::class, 'index']);
    Route::get('stock', [KendaraanController::class, 'jumlahStock']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'penjualan'
], function ($router) {
    Route::get('list', [PenjualanController::class, 'index']);
    Route::get('jumlah', [PenjualanController::class, 'jumlahTerjual']);
    Route::post('create', [PenjualanController::class, 'create']);
});