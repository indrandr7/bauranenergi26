<?php

namespace App\Http\Controllers\dapur;

use Illuminate\Http\Request;
use App\Helpers\Gudangfungsi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class BatubaraController extends Controller
{
    public function index(){
        $data['judulhalaman'] = 'Batubara';

        return view('dapur.batubara.index', $data);
    }

    public function getList(){
        $data = DB::table('batubara')
                ->orderBy('batubara.created_at', 'desc')->get();
                // ->join('ebt_jenis as jen', 'ebt.id_jenisebt', '=', 'jen.id_jenisebt')
                // ->orderBy('batubara.created_at', 'desc')->get();

        $datatable = DataTables::of($data)
            ->addIndexColumn()
            // ->addColumn('jenisebt', function($row){
            //     return '<p class="ndrparagraf">'.$row->jenis_ebt.'</p>';
            // })
            ->addColumn('action', function($row){
                $actionBtn = '<button type="button" onclick="showFormedit(\''.$row->id_batubara.'\')" title="Edit" class="btn btn-sm waves-effect waves-light btn-info m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <button type="button" onclick="hapus(\''.$row->id_batubara.'\')" title="Hapus" class="btn btn-sm waves-effect waves-light btn-danger m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-trash-2"></i>
                            </button>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        
        return $datatable;
    }

    public function add(){
        $data['judulmodal'] = 'Tambah Batubara';
        // $data['jenisebt'] = DB::table('ebt_jenis')->orderBy('jenis_ebt', 'asc');

        return view('dapur.batubara.add', $data);
    }

    public function save(Request $req){
        $sektor_pengguna = $req->post('sektor_pengguna');
        $id_pengguna = Auth::user()->id;
        $volume = $req->post('volume');
        $satuan = $req->post('satuan');
        $perusahaan = $req->post('perusahaan');

        $data = ['sektor_pengguna' => $sektor_pengguna, 
                 'volume' => $volume,
                 'satuan' => $satuan,
                 'perusahaan' => $perusahaan,
                 'created_at' => date('Y-m-d H:i:s'),
                ];
        
        try{
            $simpan = DB::table('batubara')->insert($data);

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

        $data['judulmodal'] = 'Edit Batubara';
        // $data['jenisebt'] = DB::table('ebt_jenis')->orderBy('jenis_ebt', 'asc');
        $data['data'] = DB::table('batubara')
                        // ->join('ebt_jenis as jen', 'ebt.id_jenisebt', '=', 'jen.id_jenisebt')
                        ->where('batubara.id_batubara', $id)->first();

        return view('dapur.batubara.edit', $data);
    }

    public function saveupdate(Request $req){
        $id_batubara = $req->post('id_batubara');
        $sektor_pengguna = $req->post('sektor_pengguna');
        $id_pengguna = Auth::user()->id;
        $volume = $req->post('volume');
        $satuan = $req->post('satuan');
        $perusahaan = $req->post('perusahaan');

        $data = ['sektor_pengguna' => $sektor_pengguna, 
                 'volume' => $volume,
                 'satuan' => $satuan,
                 'perusahaan' => $perusahaan,
                 'updated_at' => date('Y-m-d H:i:s'),
                ];
        
        try{
            $simpan = DB::table('batubara')->where('id_batubara', $id_batubara)->update($data);

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

        $hapus = DB::table('batubara')->where('id_batubara', $id)->delete();

        if ($hapus){
            $response = ['result'=>'success', 'message'=>'Deleting data successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Deleteting data failed'];
        }

        return response()->json($response);
    }
}
