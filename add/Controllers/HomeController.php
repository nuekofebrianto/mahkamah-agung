<?php

namespace Add\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Auth;
use Add\Models\Menu;
use Add\Models\KodeError;

class HomeController extends Controller
{

  public function index()
  {
    if (Auth::check()) {
      return redirect(route('home'));
    }
    return view('auth.login');
  }

  public function home()
  {

    $basicInfo = getBasicInfo('/home');
    return view('home.home', compact('basicInfo'));
  }

  public function sidebar()
  {
    $basicInfo  = getBasicInfo('/home');
    $menu = Menu::whereNotIn('url',['/menu'])->get();
    return view('home.sidebar', compact('basicInfo','menu'));
  }

  public function updateSidebar(Request $request)
  {
    $targetPath             = public_path() . '/../add/Views/base/leftbar.blade.php';

    $content = $request['template'];

    File::put($targetPath, $content);

    return response()->json('success');
  }

  public function carikodeerror(Request $request){

    $response = KodeError::where('kode_error',$request->kode_error)->first();

    return response()->json($response);
  }

}
