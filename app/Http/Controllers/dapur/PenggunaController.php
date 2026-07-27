<?php

namespace App\Http\Controllers\dapur;

use Illuminate\Http\Request;
use App\Helpers\Gudangfungsi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PenggunaController extends Controller
{
    public function index(){
        $data['judulhalaman'] = 'Pengguna';

        return view('dapur.pengguna.index', $data);
    }

    public function getList(){
        $data = DB::table('users as us')->join('users_level as lv', 'us.id_user_level', '=', 'lv.id_user_level')
                ->orderBy('username', 'asc')->get();

        $datatable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('uname', function($row){
                return '<p class="ndrparagraf">'.$row->username.'</p>';
            })
            ->addColumn('nama', function($row){
                return '<p class="ndrparagraf">'.$row->name.'</p>';
            })
            ->addColumn('mail', function($row){
                return '<p class="ndrparagraf">'.$row->email.'</p>';
            })
            ->addColumn('ulevel', function($row){
                return '<p class="ndrparagraf">'.$row->level.'</p>';
            })
            ->addColumn('action', function($row){
                $actionBtn = '<button type="button" onclick="showFormedit(\''.$row->id.'\')" title="Edit" class="btn btn-sm waves-effect waves-light btn-info m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <button type="button" onclick="hapus(\''.$row->id.'\')" title="Hapus" class="btn btn-sm waves-effect waves-light btn-danger m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-trash-2"></i>
                            </button>';
                return $actionBtn;
            })
            ->rawColumns(['uname', 'nama', 'mail', 'ulevel', 'action'])
            ->make(true);
        
        return $datatable;
    }

    public function add(){
        $data['judulmodal'] = 'Tambah Pengguna';
        $data['kategori'] = DB::table('users_level')->orderBy('id_user_level', 'asc');

        return view('dapur.pengguna.add', $data);
    }

    public function save(Request $req){
        $id_user_level = $req->post('id_user_level');
        $username = $req->post('username');
        $name = $req->post('name');
        $email = $req->post('email');
        $password =  Hash::make($req->post('password'));
        
        $data = [ 'username' => $username,
                 'name' => $name,
                 'email' => $email,
                 'password' => $password,
                 'id_user_level' => $id_user_level,
                 'created_at' => date('Y-m-d H:i:s'),
                ];
        
        try{
            $simpan = DB::table('users')->insert($data);

            if ($simpan){
                $response = ['result'=>'success', 'message'=>'Save successfully'];
            }else{
                $response = ['result'=>'failed', 'message'=>'Save failed'];
            }
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062){
                $response = ['result'=>'failed', 'message'=>'Duplicate key found.']; 
            }
        }

        return response()->json($response);
    }

    public function edit(Request $req){
        $id = $req->get('id');

        $data['judulmodal'] = 'Edit Pengguna';
        $data['kategori'] = DB::table('users_level')->orderBy('id_user_level', 'asc');
        $data['data'] = DB::table('users')->where('id', $id)->first();

        return view('dapur.pengguna.edit', $data);
    }

    public function saveupdate(Request $req){
        $id_pengguna = $req->post('id_pengguna');
        $id_user_level = $req->post('id_user_level');
        $username = $req->post('username');
        $name = $req->post('name');
        $email = $req->post('email');
        
        if ($req->post('password') != ''){
            $data = [ 'username' => $username,
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($req->post('password')),
                    'id_user_level' => $id_user_level,
                    'created_at' => date('Y-m-d H:i:s'),
                    ];
        }else{
            $data = [ 'username' => $username,
                    'name' => $name,
                    'email' => $email,
                    'id_user_level' => $id_user_level,
                    'created_at' => date('Y-m-d H:i:s'),
                    ];
        }
        
        try{
            $simpan = DB::table('users')->where('id', $id_pengguna)->update($data);

            if ($simpan){
                $response = ['result'=>'success', 'message'=>'Save successfully'];
            }else{
                $response = ['result'=>'failed', 'message'=>'Save failed'];
            }
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062){
                $response = ['result'=>'failed', 'message'=>'Duplicate key found.']; 
            }
        }

        return response()->json($response);
    }

    public function delete(Request $req){
        $id = $req->post('id');

        $hapus = DB::table('users')->where('id', $id)->delete();

        if ($hapus){
            $response = ['result'=>'success', 'message'=>'Deleting data successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Deleteting data failed'];
        }

        return response()->json($response);
    }

    public function gantipassword(Request $req){
        // dd(Auth::user()); dd(Auth::id());
        $id = Auth::id();

        $data['judulhalaman'] = 'Ganti Password Saya';

        return view('dapur.pengguna.gantipassword', $data);

        // echo "password: ".Hash::make('admin123');
    }

    public function passwordupdate(Request $req){
        $id_pengguna = Auth::user()->id;
        $password_sekarang = $req->post('password_sekarang');
        $password = Hash::make($req->post('password_baru'));
        
        try{
            $data = ['password' => $password];

            if (Hash::check($password_sekarang, Auth::user()->password)){
                $simpan = DB::table('users')->where('id', $id_pengguna)->update($data);

                if ($simpan){
                    $response = ['result'=>'success', 'message'=>'Save successfully'];
                }else{
                    $response = ['result'=>'failed', 'message'=>'Save failed'];
                }
            }else{
                $response = ['result'=>'failed', 'message'=>'Your current password is not match'];
            }
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062){
                $response = ['result'=>'failed', 'message'=>'Duplicate key found.']; 
            }
        }

        return response()->json($response);
    }
}
