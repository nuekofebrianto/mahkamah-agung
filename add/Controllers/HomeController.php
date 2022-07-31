<?php

namespace Add\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Auth;
use Add\Models\Menu;
use Add\Models\Layanan;
use Add\Models\Aplikasi;
use Add\Models\TingkatPrioritas;
use Add\Models\KategoriPerbaikan;

class HomeController extends Controller
{

  public function index()
  {
    if (Auth::check()) {
      $basicInfo = getBasicInfo('/home');
      $userLevel = $basicInfo['infoUser']->id;

      if ($userLevel == '4') {
        return redirect(route('homeadmin'));
      } else if ($userLevel == '5') {
        return redirect(route('homemanajer'));
      } else {

        return redirect(route('home'));
      }
    }

    return view('auth.login');
  }

  public function home()
  {

    $basicInfo = getBasicInfo('/home');
    $user_id =  Auth::id();
    $userLevel = $basicInfo['infoUser']->id;
    if ($userLevel == '4') {
      return redirect(route('homeadmin'));
    }
    if ($userLevel == '5') {
      return redirect(route('homemanajer'));
    }

    $aplikasi = Aplikasi::where('is_deleted', 0)
      ->orderBy('nama', 'asc')
      ->get();
    $tingkat_prioritas = TingkatPrioritas::where('is_deleted', 0)
      ->orderBy('nama', 'asc')
      ->get();
    $kategori_perbaikan = KategoriPerbaikan::where('is_deleted', 0)
      ->orderBy('nama', 'asc')
      ->get();

    $data = Layanan::where('created_by', $user_id)->whereIn('status', ['diterima', 'diproses', 'ditangani'])->count();
    $pengajuan = Layanan::where('created_by', $user_id)->whereIn('status', ['diterima', 'diproses', 'ditangani'])->first();

    return view('home.home', compact('basicInfo', 'aplikasi', 'tingkat_prioritas', 'kategori_perbaikan', 'pengajuan','data'));
  }

  public function homeAdmin()
  {

    $basicInfo = getBasicInfo('/home');

    $layanan = Layanan::count();
    $layananDiterima = Layanan::where('status', 'diterima')->count();
    $layananDitangani = Layanan::where('status', 'ditangani')->count();
    $layananSelesai = Layanan::where('status', 'selesai')->count();


    return view('home.homeadmin', compact('basicInfo', 'layanan', 'layananDiterima', 'layananDitangani', 'layananSelesai'));
  }

  public function homeManajer()
  {

    $basicInfo = getBasicInfo('/home');

    $layanan = Layanan::count();
    $layananDiterima = Layanan::where('status', 'diterima')->count();
    $layananDitangani = Layanan::where('status', 'ditangani')->count();
    $layananSelesai = Layanan::where('status', 'selesai')->count();
    $data = Layanan::get();



    return view('home.homemanajer', compact('basicInfo', 'layanan', 'layananDiterima', 'layananDitangani', 'layananSelesai', 'data'));
  }

  public function sidebar()
  {
    $basicInfo  = getBasicInfo('/home');
    $menu = Menu::whereNotIn('url', ['/menu'])->get();
    return view('home.sidebar', compact('basicInfo', 'menu'));
  }

  public function updateSidebar(Request $request)
  {
    $targetPath             = public_path() . '/../add/Views/base/leftbar.blade.php';

    $content = $request['template'];

    File::put($targetPath, $content);

    return response()->json('success');
  }

  public function carikodeerror(Request $request)
  {

    $response = Layanan::where('kode_error', $request->kode_error)->first();

    return response()->json($response);
  }
}
