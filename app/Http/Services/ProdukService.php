<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

class ProdukService
{
	public static function getAllPrducts()
	{
		return \App\Models\Produk::Join('warungs', 'warungs.id', '=', 'produks.idWarung')
			->Select(
				'produks.*',
				'warungs.nama as namaWarung',
				DB::raw('(CASE WHEN expiredPromo >= CURRENT_DATE THEN 1 ELSE 0 END) AS adaPromo'),
				DB::raw('sum(harga -((harga/100) * diskon)) as hargaDiskon'),
			)->groupBy('produks.id');
	}
}
