<?php

namespace Add\Api;

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
		$list = Role::where("is_deleted", 0)->where('id', '>', '2')->orderBy("created_at", "desc")->get();

		return response()->json($list);
	}

	public function filter(Request $request)
	{
		$list = Role::where("is_deleted", 0)->where('nama', $request->nama)->first();

		return response()->json($list);
	}

}
