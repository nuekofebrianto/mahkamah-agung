<?php

namespace Add\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use DataTables;

use Add\Requests\LayananRequest;

use Add\Models\Layanan;
use Add\Models\Aplikasi;
use Add\Models\TingkatPrioritas;
use Add\Models\KategoriPerbaikan;

class LayananController extends Controller
{

	public function index()
	{
		$basicInfo = getBasicInfo("/layanan");
		$aplikasi = Aplikasi::where('is_deleted', 0)
			->orderBy('nama', 'asc')
			->get();
		$tingkat_prioritas = TingkatPrioritas::where('is_deleted', 0)
			->orderBy('nama', 'asc')
			->get();
		$kategori_perbaikan = KategoriPerbaikan::where('is_deleted', 0)
			->orderBy('nama', 'asc')
			->get();
		return view("layanan.index", compact('basicInfo', 'aplikasi', 'tingkat_prioritas', 'kategori_perbaikan'));
	}

	public function list(Request $request)
	{
		$list = Layanan::where("is_deleted", 0)
			->orderBy("created_at", "desc")
			->with('aplikasi')
			->with('tingkat_prioritas')
			->with('kategori_perbaikan')
			->get();
		return DataTables()->of($list)->make(true);
	}

	public function laporan()
	{
		$basicInfo = getBasicInfo("/layanan");
		$aplikasi = Aplikasi::where('is_deleted', 0)
			->orderBy('nama', 'asc')
			->get();
		$tingkat_prioritas = TingkatPrioritas::where('is_deleted', 0)
			->orderBy('nama', 'asc')
			->get();
		$kategori_perbaikan = KategoriPerbaikan::where('is_deleted', 0)
			->orderBy('nama', 'asc')
			->get();
		return view("layanan.laporan", compact('basicInfo', 'aplikasi', 'tingkat_prioritas', 'kategori_perbaikan'));
	}

	public function listLaporan(Request $request)
	{
		$list = Layanan::where("is_deleted", 0)
			->orderBy("created_at", "desc")
			->with('aplikasi')
			->with('tingkat_prioritas')
			->with('kategori_perbaikan')
			->where('created_at', '>=', $request['periodeAwal'])
			->where('created_at', '<=', $request['periodeAkhir'])
			->get();

		return DataTables()->of($list)->make(true);
	}

	public function dataLaporan(Request $request)
	{

		$response['layanan'] = Layanan::where('created_at', '>=', $request['periodeAwal'])->where('created_at', '<=', $request['periodeAkhir'])->count();
		$response['layananDiterima'] = Layanan::where('created_at', '>=', $request['periodeAwal'])->where('created_at', '<=', $request['periodeAkhir'])->where('status', 'diterima')->count();
		$response['layananDitangani'] = Layanan::where('created_at', '>=', $request['periodeAwal'])->where('created_at', '<=', $request['periodeAkhir'])->where('status', 'ditangani')->count();
		$response['layananSelesai'] = Layanan::where('created_at', '>=', $request['periodeAwal'])->where('created_at', '<=', $request['periodeAkhir'])->where('status', 'selesai')->count();
		return response()->json($response);
	}

	public function store(LayananRequest $request)
	{

		$postData = $request->all();
		$user_id = Auth::id();
		$postData["created_by"] = $user_id;
		$store = Layanan::create($postData);

		return response()->json($store);
	}

	public function update(LayananRequest $request)
	{
		$postData = $request->all();
		$user_id = Auth::id();
		$postData["updated_by"] = $user_id;
		$postData["status"] = 'ditangani';
		$store = Layanan::where("id", $request->id)->update($postData);

		return response()->json($request->id);
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
			->with('aplikasi')
			->with('tingkat_prioritas')
			->with('kategori_perbaikan')
			->first();
		return response()->json($datas);
	}

	public function uploadBuktiInsiden(Request $request)
	{

		$public_path = public_path('/upload/bukti_insiden/');

		$request['files']->move($public_path, $request->id . ".jpg");


		$fileUploaded = '/upload/bukti_insiden/' . $request->id . '.jpg';

		return response()->json($fileUploaded);
	}

	public function uploadBuktiPerbaikan(Request $request)
	{

		$public_path = public_path('/upload/bukti_perbaikan/');

		$request['files']->move($public_path, $request->id . ".jpg");


		$fileUploaded = '/upload/bukti_perbaikan/' . $request->id . '.jpg';

		return response()->json($fileUploaded);
	}

	public function selesaiInsiden(Request $request)
	{
		$datas = Layanan::where("id", $request->id)->update(['status' => 'selesai']);

		return response()->json($datas);
	}
}
