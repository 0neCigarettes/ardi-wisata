<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Utils;

class TiketController extends Controller
{

	protected $res;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index()
	{
		$tiket = \App\Models\JenisTiket::getAllTikets()->get();
		return view('pages.admin.tiket.index', with(['tiket' => $tiket]));
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
		$payload = $request->o;
		$insert = \App\Models\JenisTiket::create($payload);
		if ($insert) {
			$this->res = Utils::response(true, 'Data berhasil ditambahkan');
		} else {
			$this->res = Utils::response(false, 'Data gagal ditambahkan');
		}
		return redirect()->back()->with($this->res);
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
		$payload = $request->o;
		$payload['updated_at'] = now();
		$update = \App\Models\JenisTiket::where('id', $id)->update($payload);
		if ($update) {
			$this->res = Utils::response(true, 'Data berhasil diubah');
		} else {
			$this->res = Utils::response(false, 'Data gagal diubah');
		}
		return redirect()->back()->with($this->res);
	}

	/**
	 * Update dikon tiket the specified resource from storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */

	public function updateDiskon(Request $request, $id)
	{
		$payload = $request->o;
		$updateDiskon = \App\Models\JenisTiket::where('id', $id)->update($payload);
		if ($updateDiskon) {
			$this->res = Utils::response(true, 'Berhasil mengubah diskon tiket');
		} else {
			$this->res = Utils::response(false, 'Gagal mengubah diskon tiket');
		}
		return redirect()->back()->with($this->res);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$delete = \App\Models\JenisTiket::Where('id', $id)->delete();
		if ($delete) {
			$this->res = Utils::response(true, 'Data berhasil dihapus');
		} else {
			$this->res = Utils::response(false, 'Data gagal dihapus');
		}
		return redirect()->back()->with($this->res);
	}

	public function apiGetHarga($id)
	{
		$harga = \App\Models\JenisTiket::select('harga')->where('id', $id)->first();
		return response()->json($harga);
	}
}
