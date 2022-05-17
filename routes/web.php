<?php

use Illuminate\Support\Facades\Route;

//Admin
use App\Http\Controllers\Admin\TiketController as AdminTiket;
use App\Http\Controllers\Admin\ParkirController as AdminParkir;
use App\Http\Controllers\Admin\WarungController as AdminWarung;
use App\Http\Controllers\Admin\ProdukController as AdminProduk;
use App\Http\Controllers\Admin\UserController as AdminPegawai;


//Tiket
use App\Http\Controllers\PegawaiTiketController as PegawaiTiket;

//Kasir
use App\Http\Controllers\PegawaiKasirController as PegawaiKasir;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return redirect()->route('login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

	//Atasan cekRole:0
	Route::group(['middleware' => ['auth:sanctum', 'cekRole:0']], function () {
		Route::prefix('atasan/')->group(function () {
			Route::get('', function () {
				return view('layouts.master');
			})->name('atasanDashboard');
		});
	});

	//Admin cekRole:1
	Route::group(['middleware' => ['auth:sanctum', 'cekRole:1']], function () {
		Route::prefix('sys/admin/')->group(function () {
			Route::get('', function () {
				return view('pages.admin.index');
			})->name('adminDashboard');

			//Tiket Admin
			Route::prefix('tiket/')->group(function () {
				Route::controller(AdminTiket::class)->group(function () {
					Route::get('', 'index')->name('admintiket');
					Route::post('add', 'store')->name('addTiket');
					Route::post('update/{id}', 'update')->name('updateTiket');
					Route::post('update-diskon/{id}', 'updateDiskon')->name('adminUpdateDiskonTiket');
					Route::get('delete/{id}', 'destroy')->name('deleteTiket');
				});
			});

			//Parkir Admin
			Route::prefix('parkir/')->group(function () {
				Route::controller(AdminParkir::class)->group(function () {
					Route::get('', 'index')->name('adminParkir');
					Route::post('add', 'store')->name('addParkir');
					Route::post('update/{id}', 'update')->name('updateParkir');
					Route::get('delete/{id}', 'destroy')->name('deleteParkir');
				});
			});

			//Warung
			Route::prefix('warung/')->group(function () {
				Route::controller(AdminWarung::class)->group(function () {
					Route::get('', 'index')->name('adminWarung');
					Route::post('add', 'store')->name('adminAddWarung');
					Route::post('update/{id}', 'update')->name('adminUpdateWarung');
					Route::get('delete/{id}', 'destroy')->name('adminDeleteWarung');
				});
			});

			//Produk
			Route::prefix('produk/')->group(function () {
				Route::controller(AdminProduk::class)->group(function () {
					Route::get('', 'index')->name('adminProduk');
					Route::post('add', 'store')->name('adminAddProduk');
					Route::post('update/{id}', 'update')->name('adminUpdateProduk');
					Route::post('update-stok/{id}', 'updateStok')->name('adminUpdateStokProduk');
					Route::post('update-promo/{id}', 'updatePromo')->name('adminUpdatePromoProduk');
					Route::get('delete/{id}', 'destroy')->name('adminDeleteProduk');
				});
			});

			//Pegawai
			Route::prefix('pegawai/')->group(function () {
				Route::controller(AdminPegawai::class)->group(function () {
					Route::get('', 'index')->name('adminPegawai');
					Route::post('add', 'store')->name('adminAddPegawai');
					Route::post('update/{id}', 'update')->name('adminUpdatePegawai');
					Route::get('delete/{id}', 'destroy')->name('adminDeletePegawai');
					Route::get('reset-password/{id}', 'resetPassword')->name('adminResetPassword');
				});
			});
		});
	});

	//Route Pegawai (Tiket && Kasir)
	Route::prefix('pegawai/')->group(function () {

		//Tiket cekRole:2
		Route::group(['middleware' => ['auth:sanctum', 'cekRole:2']], function () {
			Route::prefix('tiket/')->group(function () {
				Route::controller(PegawaiTiket::class)->group(function () {
					Route::get('', 'index')->name('tiketDashboard');
					Route::post('add', 'store')->name('pegawaiCreateTiket');
				});
			});
		});

		//Kasir cekRole:3
		Route::group(['middleware' => ['auth:sanctum', 'cekRole:3']], function () {
			Route::prefix('kasir/')->group(function () {
				Route::controller(PegawaiKasir::class)->group(function () {
					Route::get('', 'index')->name('kasirDashboard');
					Route::post('add', 'store')->name('pegawaiKasirCreate');
				});
			});
		});
	});
});
