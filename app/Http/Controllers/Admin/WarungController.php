<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Utils;

class WarungController extends Controller
{

	private $res;
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$this->res['data'] = \App\Models\Warung::all();
		return view('pages.admin.warung.index', $this->res);
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
		$payload['kode'] = 'WRG' . Utils::generateRandomString(5);

		$insert = \App\Models\Warung::insert($payload);
		if ($insert) {
			$this->res = Utils::response(true, 'Berhasil menambah warung');
		} else {
			$this->res = Utils::response(false, 'Gagal menambah warung');
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
		$update = \App\Models\Warung::where('id', $id)->update($payload);
		if ($update) {
			$this->res = Utils::response(true, 'Berhasil mengubah data warung');
		} else {
			$this->res = Utils::response(false, 'Gagal mengubah data warung');
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
		$delete = \App\Models\Warung::where('id', $id)->delete();
		if ($delete) {
			$this->res = Utils::response(true, 'Berhasil menghapus data warung');
		} else {
			$this->res = Utils::response(false, 'Gagal menghapus data warung');
		}
		return redirect()->back()->with($this->res);
	}
}
