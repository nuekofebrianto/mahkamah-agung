<?php

namespace Add\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use DataTables;

use Add\Requests\PerbaikanRequest;

use Add\Models\Perbaikan;
use Add\Models\Layanan;
use Add\Models\TingkatPrioritas;
use Add\Models\KategoriPerbaikan;

class PerbaikanController extends Controller
{

	public function index()
	{
		$basicInfo = getBasicInfo("/perbaikan");
		$layanan = Layanan::where('is_deleted', 0)
			->orderBy('nomor_antrian', 'asc')
			->get();
		$tingkat_prioritas = TingkatPrioritas::where('is_deleted', 0)
			->orderBy('nama', 'asc')
			->get();
		$kategori_perbaikan = KategoriPerbaikan::where('is_deleted', 0)
			->orderBy('nama', 'asc')
			->get();
		return view("perbaikan.index", compact('basicInfo', 'layanan', 'tingkat_prioritas', 'kategori_perbaikan'));
	}

	public function list(Request $request)
	{
		$list = Perbaikan::where("is_deleted", 0)
			->orderBy("created_at", "desc")
			->with('layanan')
			->with('tingkat_prioritas')
			->with('kategori_perbaikan')
			->get();
		return DataTables()->of($list)->make(true);
	}

	public function store(PerbaikanRequest $request)
	{

		$postData = $request->all();
		$user_id = Auth::id();
		$postData["created_by"] = $user_id;
		$store = Perbaikan::create($postData);

		return response()->json($store);
	}

	public function update(PerbaikanRequest $request)
	{
		$postData = $request->all();
		$user_id = Auth::id();
		$postData["updated_by"] = $user_id;
		$store = Perbaikan::where("id", $request->id)->update($postData);

		return response()->json($store);
	}

	public function destroy(Request $request)
	{
		$id = $request->ids[0];
		$deleted_by = Auth::id();
		$delete = Perbaikan::whereIn("id", request("ids"))->update(["is_deleted" => 1, "updated_by" => $deleted_by]);
		return response()->json($delete);
	}

	public function getData(Request $request)
	{
		$datas = Perbaikan::where("id", $request->id)
			->where("is_deleted", 0)
			->with('layanan')
			->with('tingkat_prioritas')
			->with('kategori_perbaikan')
			->first();
		return response()->json($datas);
	}
}
