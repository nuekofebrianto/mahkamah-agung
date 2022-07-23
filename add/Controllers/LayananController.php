<?php

namespace Add\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use DataTables;

use Add\Requests\LayananRequest;

use Add\Models\Layanan;
use Add\Models\KodeError;
use Add\Models\Aplikasi;

class LayananController extends Controller
{

	public function index()
	{
		$basicInfo = getBasicInfo("/layanan");
		$kode_error = KodeError::where('is_deleted', 0)
			->orderBy('kode_error', 'asc')
			->get();
		$aplikasi = Aplikasi::where('is_deleted', 0)
			->orderBy('nama', 'asc')
			->get();
		return view("layanan.index", compact('basicInfo', 'kode_error', 'aplikasi'));
	}

	public function list(Request $request)
	{
		$basicInfo = getBasicInfo("/layanan");
		$user_id = $basicInfo['infoUser']->user['id'];

		if ($basicInfo['infoUser']->id == '4') {
			$list = Layanan::where("is_deleted", 0)
				->where('created_by', $user_id)
				->orderBy("created_at", "desc")
				->with('aplikasi')
				->get();
		} else {
			$list = Layanan::where("is_deleted", 0)
				->orderBy("created_at", "desc")
				->with('aplikasi')
				->get();
		}
		return DataTables()->of($list)->make(true);
	}

	public function store(LayananRequest $request)
	{

		$postData = $request->all();
		$user_id = Auth::id();
		$postData["created_by"] = $user_id;
		$store = Layanan::create($postData);

		if ($store){
			$store2['kode_error'] = $store['kode_error'];
			$store2['penjelasan'] = $store['penjelasan'];
			$store2['penyelesaian'] = $store['penyelesaian'];
			$store2['status'] = $store['pending'];
			KodeError::create($store2);
		}

		return response()->json($store);
	}

	public function update(LayananRequest $request)
	{
		$postData = $request->all();
		$user_id = Auth::id();
		$postData["updated_by"] = $user_id;
		$store = Layanan::where("id", $request->id)->update($postData);

		return response()->json($store);
	}

	public function destroy(Request $request)
	{
		$id = $request->ids[0];
		$deleted_by = Auth::id();
		$delete = Layanan::whereIn("id", request("ids"))->update(["is_deleted" => 1, "updated_by" => $deleted_by]);
		return response()->json($delete);
	}

	public function getData(Request $request)
	{
		$datas = Layanan::where("id", $request->id)
			->where("is_deleted", 0)
			->with('kode_error')
			->with('aplikasi')
			->first();
		return response()->json($datas);
	}
}
