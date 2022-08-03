<?php

namespace Add\Controllers;

use Add\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Add\Models\User;
use Add\Requests\UserRequest;

class LoginController extends Controller
{

    public function login()
    {
        if (Auth::check()){
            return redirect(route('home'));
          }
        $pesan = '';
        return view('auth.login',compact('pesan'));
    }

    public function sign_in(Request $request)
    {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $email_cek = User::where('email',$request['username'])->first();
        if ($email_cek){
            $credentials['username'] = $email_cek['username'];
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/home');
        }

        $pesan = 'login gagal';
        return view('auth.login',compact('pesan'));

    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register(UserRequest $request)
	{
		$data = $request->all();
		$data["created_by"] = Auth::id();
		// $store = User::create($data);

		$store = User::create([
			'role_id' =>4,
			'username' => $request['username'],
			'email' => $request['email'],
			'password' => Hash::make($request['password']),
		]);

		return response()->json($store);
	}

}
