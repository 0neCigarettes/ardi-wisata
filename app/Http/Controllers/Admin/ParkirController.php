<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Utils;

class ParkirController extends Controller
{

	protected $res;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$datas = \App\Models\JenisParkir::all();
		return view('pages.admin.parkir.index')->with(['datas' => $datas]);
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
		$insert = \App\Models\JenisParkir::create($payload);
		if ($insert) {
			$this->res = Utils::response(true, 'Berhasil menambahkan data');
		} else {
			$this->res = Utils::response(false, 'Gagal menambahkan data');
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
		$update = \App\Models\JenisParkir::where('id', $id)->update($payload);
		if ($update) {
			$this->res = Utils::response(true, 'Data berhasil diubah');
		} else {
			$this->res = Utils::response(false, 'Data gagal diubah');
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
		$delete = \App\Models\JenisParkir::Where('id', $id)->delete();
		if ($delete) {
			$this->res = Utils::response(true, 'Data berhasil dihapus');
		} else {
			$this->res = Utils::response(false, 'Data gagal dihapus');
		}
		return redirect()->back()->with($this->res);
	}

	public function apiGetHarga($id)
	{
		$data = \App\Models\JenisParkir::select('harga')->where('id', $id)->first();
		return response()->json($data);
	}
}
