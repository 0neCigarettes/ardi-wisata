<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	use HasFactory;

	protected $table = 'transaksi';
	protected $fillable = [
		'idWarung',
		'kode',
		'total',
	];

	public function warung()
	{
		return $this->belongsTo('App\Models\Warung', 'idWarung', 'id');
	}

	public function details()
	{
		return $this->hasMany('App\Models\DetailTransaksi', 'idTransaksi', 'id');
	}
}
