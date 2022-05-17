<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Utils;

class ProdukController extends Controller
{

	private $res;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$keyword = $request->keyword;
		$idWarung = $request->idWarung;

		$produk = \App\Http\Services\ProdukService::getAllPrducts();

		if ($keyword) {
			$produk->where('produks.nama', 'LIKE', '%' . $keyword . '%');
		}

		if ($idWarung && $idWarung !== 'all') {
			$produk->where('warungs.id', $idWarung);
		}

		$this->res = [
			'data' => $produk->paginate(12)->appends($request->query()),
			'query' => $request->query(),
			'warung' => \App\Models\Warung::Select('id', 'nama', 'kode')->get()
		];
		return view('pages.admin.produk.index', $this->res);
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
		$payload['kode'] = 'PRD' . Utils::generateRandomString(9);

		$insert = \App\Models\Produk::insert($payload);
		if ($insert) {
			$this->res = Utils::response(true, 'Berhasil menambah produk');
		} else {
			$this->res = Utils::response(false, 'Gagal menambah produk');
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

		$update = \App\Models\Produk::where('id', $id)->update($payload);
		if ($update) {
			$this->res = Utils::response(true, 'Berhasil mengubah data produk');
		} else {
			$this->res = Utils::response(false, 'Gagal mengubah data produk');
		}
		return redirect()->back()->with($this->res);
	}

	/**
	 * update stok produk the specified resource from storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function updateStok(Request $request, $id)
	{
		$payload = $request->o;
		$updateStok = \App\Models\Produk::where('id', $id)->update($payload);
		if ($updateStok) {
			$this->res = Utils::response(true, 'Berhasil mengubah stok produk');
		} else {
			$this->res = Utils::response(false, 'Gagal mengubah stok produk');
		}
		return redirect()->back()->with($this->res);
	}

	/**
	 * update promo produk the specified resource from storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function updatePromo(Request $request, $id)
	{
		$payload = $request->o;
		$updatePromo = \App\Models\Produk::where('id', $id)->update($payload);
		if ($updatePromo) {
			$this->res = Utils::response(true, 'Berhasil mengubah promo produk');
		} else {
			$this->res = Utils::response(false, 'Gagal mengubah promo produk');
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
		$delete = \App\Models\Produk::where('id', $id)->delete();
		if ($delete) {
			$this->res = Utils::response(true, 'Berhasil menghapus data produk');
		} else {
			$this->res = Utils::response(false, 'Gagal menghapus data produk');
		}
		return redirect()->back()->with($this->res);
	}
}
