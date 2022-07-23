<?php

namespace Add\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use DataTables;


use Add\Requests\RoleRequest;

use Add\Models\Role;
use Add\Models\RoleAkses;
use Add\Models\Menu;

class RoleController extends Controller
{

	public function index()
	{
		$basicInfo = getBasicInfo('/role');
		$menu = Menu::whereNotIn('url',['/menu'])->get();
		return view('role.index', compact('basicInfo', 'menu'));
	}

	public function list(Request $request)
	{
		$list = Role::where("is_deleted", 0)->where('id', '>', '1')->orderBy("created_at", "desc")->get();
		return DataTables()->of($list)->make(true);
	}

	public function store(RoleRequest $request)
	{

		$post_detail = [];
		$role_akses = $request->postDataDetail;
		$role['nama'] = $request->nama;
		$user_id = Auth::id();
		$role["created_by"] = $user_id;
		$RoleStore = Role::create($role);

		if ($RoleStore) {
			foreach ($role_akses as $key => $value) {
				$value["role_id"] = $RoleStore["id"];
				$value["created_by"] = $user_id;
				$post_detail = $value;
				$RoleAksesStore = RoleAkses::create($post_detail);
			}
		}

		return response()->json('success');
	}
	public function update(RoleRequest $request)
	{
		$post_detail = [];
		$role_akses = $request->postDataDetail;
		$role['nama'] = $request->nama;
		$user_id = Auth::id();
		$role["updated_by"] = $user_id;
		$RoleStore = Role::where("id", $request->id)->update($role);

		if ($RoleStore) {
			$delete = RoleAkses::where("role_id", $request->id)->delete();

			foreach ($role_akses as $key => $value) {
				$value["role_id"] = $request->id;
				$value["created_by"] = $user_id;
				$value["updated_by"] = $user_id;
				$post_detail = $value;
				$RoleAksesStore = RoleAkses::create($post_detail);
			}
		}

		return response()->json($value);
	}
	public function destroy(Request $request)
	{
		$id = $request->ids[0];
		$deleted_by = Auth::id();
		$delete = Role::whereIn("id", request("ids"))->update(["is_deleted" => 1, "updated_by" => $deleted_by]);
		return response()->json($delete);
	}
	public function getData(Request $request)
	{
		$role = Role::where("id", $request->id)->where("is_deleted", 0)->get();
		$role_akses = RoleAkses::where("role_id", $request->id)->where("is_deleted", 0)->get();
		$datas = array("role" => $role, "role_akses" => $role_akses);

		return response()->json($datas);
	}
}
