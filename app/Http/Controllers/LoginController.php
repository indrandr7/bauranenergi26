<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $req){
        $credentials = $req->validate([
            // 'email' => ['required', 'string', 'email'],
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)){
            $pengguna = DB::table('users as us')
                        ->join('users_level as lv', 'us.id_user_level', '=', 'lv.id_user_level')
                        ->where('us.username', $req->username)->first();
            Session::put('sesNamalengkap', $pengguna->name);
            Session::put('sesLevel', $pengguna->level);
            Session::put('sesLeveldesc', $pengguna->keterangan);

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email'=>'The provided credentials do not match our records',
        ])->onlyInput('email');
    }
}
