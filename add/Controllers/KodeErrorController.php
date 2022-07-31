<?php

namespace Add\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use DataTables;

use Add\Requests\KodeErrorRequest;

use Add\Models\KodeError;
use Add\Models\Aplikasi;
use Add\Models\TingkatPrioritas;
use Add\Models\KategoriPerbaikan;

class KodeErrorController extends Controller
{

	public function index()
	{
		$basicInfo = getBasicInfo("/kode_error");
		$aplikasi = Aplikasi::get();
		$tingkat_prioritas = TingkatPrioritas::get();
		$kategori_perbaikan = KategoriPerbaikan::get();
		return view("kode_error.index", compact('basicInfo','aplikasi','tingkat_prioritas','kategori_perbaikan'));
	}

	public function list(Request $request)
	{
		$list = KodeError::where("is_deleted", 0)
			->orderBy("created_at", "desc")
			->with('aplikasi','tingkat_prioritas','kategori_perbaikan')
			->get();
		return DataTables()->of($list)->make(true);
	}

	public function store(KodeErrorRequest $request)
	{

		$postData = $request->all();
		$user_id = Auth::id();
		$postData["created_by"] = $user_id;
		$store = KodeError::create($postData);

		return response()->json($store);
	}

	public function update(KodeErrorRequest $request)
	{
		$postData = $request->all();
		$user_id = Auth::id();
		$postData["updated_by"] = $user_id;
		$store = KodeError::where("id", $request->id)->update($postData);

		return response()->json($store);
	}

	public function destroy(Request $request)
	{
		$id = $request->ids[0];
		$deleted_by = Auth::id();
		$delete = KodeError::whereIn("id", request("ids"))->update(["is_deleted" => 1, "updated_by" => $deleted_by]);
		return response()->json($delete);
	}

	public function getData(Request $request)
	{
		$datas = KodeError::where("id", $request->id)
			->where("is_deleted", 0)
			->first();
		return response()->json($datas);
	}
}
