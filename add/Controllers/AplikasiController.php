<?php

namespace Add\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use DataTables;

use Add\Requests\AplikasiRequest;

use Add\Models\Aplikasi;

class AplikasiController extends Controller
{

	public function index()
	{
		$basicInfo = getBasicInfo("/aplikasi");

		return view("aplikasi.index", compact('basicInfo'));
	}

	public function list(Request $request)
	{
		$list = Aplikasi::where("is_deleted", 0)
			->orderBy("created_at", "desc")
			->get();
		return DataTables()->of($list)->make(true);
	}

	public function store(AplikasiRequest $request)
	{

		$postData = $request->all();
		$user_id = Auth::id();
		$postData["created_by"] = $user_id;
		$store = Aplikasi::create($postData);

		return response()->json($store);
	}

	public function update(AplikasiRequest $request)
	{
		$postData = $request->all();
		$user_id = Auth::id();
		$postData["updated_by"] = $user_id;
		$store = Aplikasi::where("id", $request->id)->update($postData);

		return response()->json($store);
	}

	public function destroy(Request $request)
	{
		$id = $request->ids[0];
		$deleted_by = Auth::id();
		$delete = Aplikasi::whereIn("id", request("ids"))->update(["is_deleted" => 1, "updated_by" => $deleted_by]);
		return response()->json($delete);
	}

	public function getData(Request $request)
	{
		$datas = Aplikasi::where("id", $request->id)
			->where("is_deleted", 0)
			->first();
		return response()->json($datas);
	}
}
