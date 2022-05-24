<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
	use HasFactory;

	protected $table = 'produks';
	protected $fillable = [
		'idWarung',
		'kode',
		'nama',
		'jumlahSatuan',
		'harga',
		'modal',
		'diskon',
		'expiredPromo',
		'stok',
		'keterangan'
	];

	public function warung()
	{
		return $this->belongsTo('App\Models\Warung', 'idWarung');
	}
}
