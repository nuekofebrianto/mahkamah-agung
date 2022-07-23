<?php

namespace Add\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use Session;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Add\Requests\UserRequest;

use Add\Models\User;
use Add\Models\Role;

class UserController extends Controller
{

	public function index()
	{
		$role = Role::where("is_deleted", 0)->where("id", ">", 2)->orderBy("created_at", "desc")->get();
		$basicInfo = getBasicInfo('/user');

		return view('user.index', compact('basicInfo', 'role'));
	}

	public function list(Request $request)
	{
		$list = User::Where("is_deleted", 0)->where("id", ">", 1)->orderBy("created_at", "desc")->with("role")->get();
		return DataTables()->of($list)->make(true);
	}

	public function store(UserRequest $request)
	{
		$data = $request->all();
		$data["created_by"] = Auth::id();
		// $store = User::create($data);

		$store = User::create([
			'role_id' => $request['role_id'],
			'username' => $request['username'],
			'email' => $request['email'],
			'password' => Hash::make($request['password']),
		]);

		return response()->json($store);
	}
	public function update(UserRequest $request)
	{
		$data['id'] = $request['id'];
		$data['role_id'] = $request['role_id'];
		$data['username'] = $request['username'];
		$data['email'] = $request['email'];
		$update = User::where("id", $request->id)->update($data);
		return response()->json($update);
	}
	public function destroy(Request $request)
	{
		$id = $request->ids[0];
		$deleted_by = Auth::id();
		$delete = User::whereIn("id", request("ids"))->update(["is_deleted" => 1, "updated_by" => $deleted_by]);
		return response()->json($delete);
	}
	public function getData(Request $request)
	{
		$datas = User::where("id", $request->id)->where("is_deleted", 0)->first();
		return response()->json($datas);
	}

	public function updatePassword(Request $request)
	{
		$id = $request['id'];

		$user = User::findOrFail($id);

		if ($request['current-password'] == '') {
			$response['status'] = 'Gagal';
			$response['icon'] = 'danger';
			$response['pesan'] = 'Password Lama tidak boleh kosong !';
			return response()->json($response);
		}



		if (!(Hash::check($request['current-password'], $user->password))) {
			$response['status'] = 'Gagal';
			$response['icon'] = 'danger';
			$response['pesan'] = 'Password Lama salah !';
			return response()->json($response);
		}

		if ($request['new-password'] == '') {
			$response['status'] = 'Gagal';
			$response['icon'] = 'danger';
			$response['pesan'] = 'Password Baru tidak boleh kosong !';
			return response()->json($response);
		}

		if (strcmp($request['current-password'], $request['new-password']) == 0) {
			$response['status'] = 'Gagal';
			$response['icon'] = 'danger';
			$response['pesan'] = 'Password Baru tidak boleh sama dengan yang lama !';
			return response()->json($response);
		}
		if (!(strcmp($request['new-password'], $request['confirm-password'])) == 0) {
			$response['status'] = 'Gagal';
			$response['icon'] = 'danger';
			$response['pesan'] = 'Password Baru tidak cocok dengan Konfirmasi Password Baru !';
			return response()->json($response);
		}

		$user->password = Hash::make($request['new-password']);
		$user->save();

		$response['status'] = 'Berhasil';
		$response['icon'] = 'success';
		$response['pesan'] = 'Password Berhasil di ubah';
		return response()->json($response);
	}

	public function gantiPassword(Request $request)
	{
		$user_id =  Auth::id();
		$datas = User::where("id", $user_id)->with('role')->first();
		$basicInfo = getBasicInfo('/user');
		return view('user.gantipassword', compact('basicInfo', 'datas'));
	}

	public function profile()
	{

		$user_id =  Auth::id();
		$datas = User::where("id", $user_id)->with('role')->first();
		$role = Role::where("is_deleted", 0)->where("id", ">", 2)->orderBy("created_at", "desc")->get();
		$basicInfo = getBasicInfo('/user');
		return view('user.profile', compact('basicInfo', 'role', 'datas'));
	}

	public function uploadPotoProfile(Request $request)
	{

		$public_path = public_path('/upload/profile-photos/');

		// File::deleteDirectory($public_path);

		$request['files']->move($public_path, $request->id . ".jpg");


		$potoProfile = '/upload/profile-photos/' . $request->id . '.jpg';

		return response()->json($potoProfile);
	}
}
