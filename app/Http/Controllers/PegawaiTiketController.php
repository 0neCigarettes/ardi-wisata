<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Services\PDFService;
use \App\Http\Utils;


class PegawaiTiketController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$jenisTikets = \App\Models\JenisTiket::getAllTikets()->get();
		$jenisParkirs = \App\Models\JenisParkir::all();
		return view('pages.tiket.index')->with([
			'jenisTikets' => $jenisTikets,
			'jenisParkirs' => $jenisParkirs
		]);
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
		//setting PDF
		$lengthPaper = 300.0;

		$sendToPDF = [
			'detail' => []
		];

		$isParkir = $request->isParkir ? 1 : 0;
		$tiket = $request->tiket;
		$parkir = $request->parkir;
		$kodeTiket = 'XRT-' . Utils::generateRandomString(16);
		$jenisKendaraan = null;


		if ($isParkir) {
			$jenisKendaraan = \App\Models\JenisParkir::Select('label')->Where('id', $parkir['idJenis'])->first()->label;
			$lengthPaper += 400.0;
		}

		$payloadTiket = [
			'kode' => $kodeTiket,
			'isParkir' => $isParkir,
			'nomorPolisi' => $isParkir ? $parkir['noPol'] : null,
			'jenisKendaraan' => $jenisKendaraan,
			'hargaParkir' => $isParkir ? (int)$parkir['harga'] : 0,
			'totalBayar' => (int)$request->total
		];

		$createTiket = \App\Models\Tiket::create($payloadTiket);
		if ($createTiket) {
			$sendToPDF = $createTiket->toArray();
			$detail = [];
			foreach ($tiket as $t) {
				$jenisTiket = \App\Models\JenisTiket::getAllTikets()->Where('id', $t['idJenis'])->first();
				$lengthPaper += 70.0;
				if ($payloadTiket['isParkir'] == 1) {
					$lengthPaper += 80.0;
				}

				$payloadDetail = [
					'idTiket' => $createTiket->id,
					'jenisTiket' => $jenisTiket->label,
					'jumlahBeli' => (int)$t['jumlah'],
					'adaDiskon' => $jenisTiket->adaDiskon,
					'diskon' => $jenisTiket->diskon,
					'hargaDiskon' => $jenisTiket->hargaDiskon,
					'harga' => (int)$jenisTiket->harga,
				];
				$detailTiket = \App\Models\DetailTiket::create($payloadDetail);
				array_push($detail, $detailTiket->toArray());
			}
			$sendToPDF['detail'] = $detail;
		}

		return PDFservice::generatePDF('pages.components._tiket', $sendToPDF, array(10, -30, 253.6, $lengthPaper));
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
