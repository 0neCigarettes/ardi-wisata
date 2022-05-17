<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;

class PegawaiKasirController extends Controller
{
	protected $res;
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$barangs = \App\Http\Services\ProdukService::getAllPrducts()->with('warung')
			->Where('idWarung', Auth::user()->idWarung)
			->get();
		$this->res = [
			'barangs' => $barangs
		];
		return view('pages.kasir.index', $this->res);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		$lengthPaper = 320.0;

		$barang = $request->barang;

		$sendToPDF = [
			'barang' => []
		];

		$transaksi = [
			'idWarung' => Auth::user()->idWarung,
			'kode' => 'TRX-' . date('dmY') . \App\Http\Utils::generateRandomString(9),
			'total' => $request->total
		];

		$createTransaksi = \App\Models\Transaksi::create($transaksi);
		if ($createTransaksi) {
			$sendToPDF = $createTransaksi;
			$detail = [];
			foreach ($barang as $b) {
				$lengthPaper += 50.0;

				Produk::find($b['idBarang'])->decrement('stok', (int)$b['jumlahBeli']);
				$produk = \App\Http\Services\ProdukService::getAllPrducts()->Where('produks.id', '=', $b['idBarang'])->first();
				$payloadBarang = [
					'idTransaksi' => $createTransaksi->id,
					'namaProduk' => $produk->nama,
					'harga' => $produk->harga,
					'diskon' => $produk->diskon,
					'jumlahBeli' => (int)$b['jumlahBeli'],
					'adaDiskon' => $produk->adaPromo,
					'hargaDiskon' => $produk->hargaDiskon,
				];
				$detailBarang = \App\Models\DetailTransaksi::create($payloadBarang);
				array_push($detail, $detailBarang->toArray());
			}
			$sendToPDF['detail'] = $detail;
		}

		return \App\Http\Services\PDFService::generatePDF('pages.components._struk', $sendToPDF, array(10, -30, 253.6, $lengthPaper));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
