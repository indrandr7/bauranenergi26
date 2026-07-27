<?php

namespace App\Http\Controllers\dapur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Helpers\Gudangfungsi;

class DashboardController extends Controller
{
    public function index(){
        $data['judulhalaman'] = 'Bauran Energi Daerah Provinsi Sumatera Barat Tahun 2026';
        $data['profilenergi'] = DB::table('profil_energi')->orderBy('id_profil_energi', 'desc')->limit('1')->first();
        $data['sumberenergi'] = DB::table('sumber_energi')->get();

        return view('dapur.dashboard', $data);
    }
}
