<?php

namespace Add\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use DataTables;

use Add\Models\Menu;
use Add\Models\Gudang;

use Add\Requests\GudangRequest;


class GudangController extends Controller
{

	public function index()
	{
		$basicInfo = getBasicInfo('/gudang');
		$menu = Menu::get();
		return view('gudang.index', compact('basicInfo', 'menu'));
	}

	public function list(Request $request)
	{
		$list = Gudang::where("is_deleted", 0)->orderBy("created_at", "desc")->get();
		return DataTables()->of($list)->make(true);
	}

	public function store(GudangRequest $request)
	{

		$postData = $request->all();
		$user_id = Auth::id();
		$postData["created_by"] = $user_id;
		$store = Gudang::create($postData);

		return response()->json($store);
	}
	public function update(GudangRequest $request)
	{
		$postData = $request->all();
		$user_id = Auth::id();
		$postData["updated_by"] = $user_id;
		$store = Gudang::where("id", $request->id)->update($postData);

		return response()->json($store);
	}
	public function destroy(Request $request)
	{
		$id = $request->ids[0];
		$deleted_by = Auth::id();
		$delete = Gudang::whereIn("id", request("ids"))->update(["is_deleted" => 1, "updated_by" => $deleted_by]);
		return response()->json($delete);
	}
	public function getData(Request $request)
	{
		$datas = Gudang::where("id", $request->id)->where("is_deleted", 0)->first();
		return response()->json($datas);
	}
}
