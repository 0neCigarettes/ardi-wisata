<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisParkir extends Model
{
	use HasFactory;

	protected $table = 'jenis_parkirs';
	protected $fillable = [
		'label',
		'harga'
	];
}
