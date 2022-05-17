<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ParkirController;
use App\Http\Controllers\Admin\TiketController;

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

Route::controller(ParkirController::class)->group(function () {
	Route::get('/harga-parkir/{id}', 'apiGetHarga');;
});
Route::controller(TiketController::class)->group(function () {
	Route::get('/harga-tiket/{id}', 'apiGetHarga');;
});
