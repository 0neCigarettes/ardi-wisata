<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTiket extends Model
{
	use HasFactory;

	protected $table = 'detail_tikets';
	protected $fillable = [
		'idTiket',
		'jenisTiket',
		'jumlahBeli',
		'adaDiskon',
		'diskon',
		'hargaDiskon',
		'harga'
	];
}
