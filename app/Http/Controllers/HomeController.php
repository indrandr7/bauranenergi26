<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use App\Helpers\Gudangfungsi as Gudangfungsi;

class HomeController extends Controller
{
    public function index(){
        $data['sliders'] = DB::table('image_slider')->where('is_active', 'yes')->orderBy('created_at', 'desc');
        $data['berita'] = DB::table('berita')->where('id_status_berita', '2')->orderBy('tanggal_publikasi', 'desc')->limit(4);
        $data['publikasi'] = DB::table('publikasi')->orderBy('tanggal_publikasi', 'desc');
        
        return view('home', $data);
    }

    public function indeks(){
        return view('home_indeks');
    }
}
