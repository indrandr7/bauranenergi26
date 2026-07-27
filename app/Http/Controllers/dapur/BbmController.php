<?php

namespace App\Http\Controllers\dapur;

use Illuminate\Http\Request;
use App\Helpers\Gudangfungsi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class BbmController extends Controller
{
    public function index(){
        $data['judulhalaman'] = 'BBM';

        return view('dapur.bbm.index', $data);
    }

    public function getList(){
        $data = DB::table('bbm')
                ->join('bbm_jenis as bj', 'bbm.id_jenisbbm', '=', 'bj.id_jenisbbm')
                ->orderBy('bbm.created_at', 'desc')->get();

        $datatable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('jenisbbm', function($row){
                return '<p class="ndrparagraf">'.$row->jenis_bbm.'</p>';
            })
            ->addColumn('action', function($row){
                $actionBtn = '<button type="button" onclick="showFormedit(\''.$row->id_bbm.'\')" title="Edit" class="btn btn-sm waves-effect waves-light btn-info m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <button type="button" onclick="hapus(\''.$row->id_bbm.'\')" title="Hapus" class="btn btn-sm waves-effect waves-light btn-danger m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-trash-2"></i>
                            </button>';
                return $actionBtn;
            })
            ->rawColumns(['jenisbbm', 'action'])
            ->make(true);
        
        return $datatable;
    }

    public function add(){
        $data['judulmodal'] = 'Tambah BBM';
        $data['jenisbbm'] = DB::table('bbm_jenis')->orderBy('jenis_bbm', 'asc');

        return view('dapur.bbm.add', $data);
    }

    public function save(Request $req){
        $id_jenisbbm = $req->post('id_jenisbbm');
        $id_pengguna = Auth::user()->id;
        $volume = $req->post('volume');
        $satuan = $req->post('satuan');
        $sumberdata = $req->post('sumberdata');

        $data = ['id_jenisbbm' => $id_jenisbbm, 
                 'volume' => $volume,
                 'satuan' => $satuan,
                 'sumberdata' => $sumberdata,
                 'created_at' => date('Y-m-d H:i:s'),
                ];
        
        try{
            $simpan = DB::table('bbm')->insert($data);

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

        $data['judulmodal'] = 'Edit BBM';
        $data['jenisbbm'] = DB::table('bbm_jenis')->orderBy('jenis_bbm', 'asc');
        $data['data'] = DB::table('bbm')
                        ->join('bbm_jenis as bj', 'bbm.id_jenisbbm', '=', 'bj.id_jenisbbm')
                        ->where('bbm.id_bbm', $id)->first();

        return view('dapur.bbm.edit', $data);
    }

    public function saveupdate(Request $req){
        $id_bbm = $req->post('id_bbm');
        $id_jenisbbm = $req->post('id_jenisbbm');
        $id_pengguna = Auth::user()->id;
        $volume = $req->post('volume');
        $satuan = $req->post('satuan');
        $sumberdata = $req->post('sumberdata');

        $data = ['id_jenisbbm' => $id_jenisbbm, 
                 'volume' => $volume,
                 'satuan' => $satuan,
                 'sumberdata' => $sumberdata,
                 'created_at' => date('Y-m-d H:i:s'),
                ];
        
        try{
            $simpan = DB::table('bbm')->where('id_bbm', $id_bbm)->update($data);

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

        $hapus = DB::table('bbm')->where('id_bbm', $id)->delete();

        if ($hapus){
            $response = ['result'=>'success', 'message'=>'Deleting data successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Deleteting data failed'];
        }

        return response()->json($response);
    }
}
