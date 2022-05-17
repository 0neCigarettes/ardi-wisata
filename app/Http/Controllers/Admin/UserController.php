<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Services\UserService;
use App\Http\Utils;

class UserController extends Controller
{
	private $res;
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{

		$role = [
			0 => [
				'id' => 2,
				'label' => 'Pegawai Tiket',
			],
			1 => [
				'id' => 3,
				'label' => 'Pegawai Kasir',
			],
		];

		$warung = \App\Models\Warung::Select('id', 'nama', 'kode')->get();
		$data = UserService::getPegawais();


		if ($request->code && $request->code != 'all') {
			$data->where('role', '=', $request->code);
		}

		if ($request->name) {
			$data->where('name', 'like', '%' . $request->name . '%');
		}

		$this->res = [
			'data' => $data->paginate(12)->appends($request->query()),
			'role' => $role,
			'query' => $request->query(),
			'warung' => $warung,
		];
		return view('pages.admin.pegawai.index', $this->res);
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
		$payload['password'] = Hash::make(12345678);

		$create =  \App\Models\User::create($payload);
		if ($create) {
			$this->res = Utils::response(true, 'Berhasil menambahkan pegawai');
		} else {
			$this->res = Utils::response(false, 'Gagal menambahkan pegawai');
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
		$update = \App\Models\User::where('id', '=', $id)->update($payload);
		if ($update) {
			$this->res = Utils::response(true, 'Berhasil mengubah pegawai');
		} else {
			$this->res = Utils::response(false, 'Gagal mengubah pegawai');
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
		$delete = \App\Models\User::where('id', '=', $id)->delete();
		if ($delete) {
			$this->res = Utils::response(true, 'Berhasil menghapus pegawai');
		} else {
			$this->res = Utils::response(false, 'Gagal menghapus pegawai');
		}
		return redirect()->back()->with($this->res);
	}

	public function resetPassword($id)
	{
		$pw = 12345678;
		$reset = \App\Models\User::where('id', $id)->update(['password' => Hash::make($pw)]);
		if ($reset) {
			$this->res = Utils::response(true, 'Berhasil mereset password: ' . $pw);
		} else {
			$this->res = Utils::response(false, 'Gagal mereset password');
		}
		return redirect()->back()->with($this->res);
	}
}
