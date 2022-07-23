<?php

namespace Add\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use DataTables;

use Add\Requests\KategoriPerbaikanRequest;

use Add\Models\KategoriPerbaikan;

class KategoriPerbaikanController extends Controller
{

	public function index()
	{
		$basicInfo = getBasicInfo("/kategori_perbaikan");

		return view("kategori_perbaikan.index", compact('basicInfo'));
	}

	public function list(Request $request)
	{
		$list = KategoriPerbaikan::where("is_deleted", 0)
			->orderBy("created_at", "desc")
			->get();
		return DataTables()->of($list)->make(true);
	}

	public function store(KategoriPerbaikanRequest $request)
	{

		$postData = $request->all();
		$user_id = Auth::id();
		$postData["created_by"] = $user_id;
		$store = KategoriPerbaikan::create($postData);

		return response()->json($store);
	}

	public function update(KategoriPerbaikanRequest $request)
	{
		$postData = $request->all();
		$user_id = Auth::id();
		$postData["updated_by"] = $user_id;
		$store = KategoriPerbaikan::where("id", $request->id)->update($postData);

		return response()->json($store);
	}

	public function destroy(Request $request)
	{
		$id = $request->ids[0];
		$deleted_by = Auth::id();
		$delete = KategoriPerbaikan::whereIn("id", request("ids"))->update(["is_deleted" => 1, "updated_by" => $deleted_by]);
		return response()->json($delete);
	}

	public function getData(Request $request)
	{
		$datas = KategoriPerbaikan::where("id", $request->id)
			->where("is_deleted", 0)
			->first();
		return response()->json($datas);
	}
}
