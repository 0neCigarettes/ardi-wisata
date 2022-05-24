<?php

namespace App\Http\Controllers\Atasan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class AtasanController extends Controller
{

	private $res;
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	public function penjualan(Request $request)
	{
		$code = $request->keyword;
		$idWarung = $request->idWarung;
		$startDate = $request->tanggalAwal;
		$endDate = $request->tanggalAkhir;

		$data = \App\Models\Transaksi::with('details')->with('warung');

		if ($code) {
			$data->where('kode', '=', $code);
		}

		if ($idWarung) {
			$data->where('idWarung', '=', $idWarung);
		}

		if ($startDate && empty($endDate)) {
			$data = $this->getDataBySameDate($data, $startDate);
		}

		if ($startDate && $endDate) {
			$data = $this->getDataByRangeDate($data, $startDate, $endDate);
		}

		$namaWarung = \App\Models\Warung::where('id', $idWarung)->first();
		$totalFilter = $data->sum('total');
		$counterModal = $data->get();
		$totalModal = 0;

		foreach ($counterModal as $d) {
			foreach ($d->details as $detail) {
				$totalModal += $detail->modal * $detail->jumlahBeli;
			}
		}

		$keuntungan = $totalFilter - $totalModal;

		$allData = \App\Models\Transaksi::all();
		$totalAll = 0;
		foreach ($allData as $r) {
			$totalAll += $r->total;
		}

		$this->res = [
			'data' => $data->paginate(12)->appends($request->query()),
			'totalFilter' => $totalFilter,
			'totalAll' => $totalAll,
			'totalModal' => $totalModal,
			'keuntungan' => $keuntungan,
			'query' => $request->query(),
			'warung' => \App\Models\Warung::Select('id', 'nama', 'kode')->get(),
			'namaWarung' => $namaWarung,
		];

		return view('pages.atasan.index', $this->res);
	}

	public function rekapTP(Request $request)
	{
		$code = $request->keyword;
		$startDate = $request->tanggalAwal;
		$endDate = $request->tanggalAkhir;

		$data = \App\Models\Tiket::with('details');

		if ($code) {
			$data->where('kode', '=', $code);
		}

		if ($startDate && empty($endDate)) {
			$data = $this->getDataBySameDate($data, $startDate);
		}

		if ($startDate && $endDate) {
			$data = $this->getDataByRangeDate($data, $startDate, $endDate);
		}

		$totalFilter = $data->sum('totalBayar');
		$counterData = \App\Models\Tiket::all();
		$totalAll = \App\Models\Tiket::sum('totalBayar');
		$totalTiket = 0;
		$totalParkir = 0;
		foreach ($counterData as $r) {
			if ($r['isParkir'] === 1) {
				$totalParkir += $r['hargaParkir'];
			}
			foreach ($r['details'] as $d) {
				$totalTiket += $d['adaDiskon'] === 1 ? $d['hargaDiskon'] * $d['jumlahBeli'] : $d['harga'] * $d['jumlahBeli'];
			}
		}



		$this->res = [
			'data' => $data->paginate(12)->appends($request->query()),
			'totalFilter' => $totalFilter,
			'totalAll' => $totalAll,
			'totalTiket' => $totalTiket,
			'totalParkir' => $totalParkir,
			'query' => $request->query(),
		];

		return view('pages.atasan.rekapTiketParkir', $this->res);
	}

	private function getDataByRangeDate($eloquent, $startDate, $endDate)
	{
		if ($startDate && $endDate) {
			$eloquent->whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate);
		}
		return $eloquent;
	}

	private function getDataBySameDate($eloquent, $date)
	{
		if ($date) {
			$eloquent->whereDate('created_at', $date);
		}
		return $eloquent;
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
		//
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
