<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JenisTiket extends Model
{
	use HasFactory;

	protected $table = 'jenis_tikets';
	protected $fillable = [
		'label',
		'harga',
		'diskon',
		'expiredDiskon'
	];

	public static function getAllTikets()
	{
		return self::Select(
			'*',
			DB::raw('(CASE WHEN expiredDiskon >= CURRENT_DATE THEN 1 ELSE 0 END) AS adaDiskon'),
			DB::raw('sum(harga -((harga/100) * diskon)) as hargaDiskon'),
		)->groupBy('id');
	}
}
