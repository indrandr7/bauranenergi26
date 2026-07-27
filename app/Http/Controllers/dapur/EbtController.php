<?php

namespace App\Http\Controllers\dapur;

use Illuminate\Http\Request;
use App\Helpers\Gudangfungsi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class EbtController extends Controller
{
    public function index(){
        $data['judulhalaman'] = 'EBT';

        return view('dapur.ebt.index', $data);
    }

    public function getList(){
        $data = DB::table('ebt')
                ->join('ebt_jenis as jen', 'ebt.id_jenisebt', '=', 'jen.id_jenisebt')
                ->orderBy('ebt.created_at', 'desc')->get();

        $datatable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('jenisebt', function($row){
                return '<p class="ndrparagraf">'.$row->jenis_ebt.'</p>';
            })
            ->addColumn('action', function($row){
                $actionBtn = '<button type="button" onclick="showFormedit(\''.$row->id_ebt.'\')" title="Edit" class="btn btn-sm waves-effect waves-light btn-info m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <button type="button" onclick="hapus(\''.$row->id_ebt.'\')" title="Hapus" class="btn btn-sm waves-effect waves-light btn-danger m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-trash-2"></i>
                            </button>';
                return $actionBtn;
            })
            ->rawColumns(['jenisebt', 'action'])
            ->make(true);
        
        return $datatable;
    }

    public function add(){
        $data['judulmodal'] = 'Tambah EBT';
        $data['jenisebt'] = DB::table('ebt_jenis')->orderBy('jenis_ebt', 'asc');

        return view('dapur.ebt.add', $data);
    }

    public function save(Request $req){
        $id_jenisebt = $req->post('id_jenisebt');
        $id_pengguna = Auth::user()->id;
        $kapasitas = $req->post('kapasitas');
        $produksi = $req->post('produksi');
        $energi = $req->post('energi');
        $sumberdata = $req->post('sumberdata');

        $data = ['id_jenisebt' => $id_jenisebt, 
                 'kapasitas' => $kapasitas,
                 'produksi' => $produksi,
                 'energi' => $energi,
                 'sumberdata' => $sumberdata,
                 'created_at' => date('Y-m-d H:i:s'),
                ];
        
        try{
            $simpan = DB::table('ebt')->insert($data);

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

        $data['judulmodal'] = 'Edit EBT';
        $data['jenisebt'] = DB::table('ebt_jenis')->orderBy('jenis_ebt', 'asc');
        $data['data'] = DB::table('ebt')
                        ->join('ebt_jenis as jen', 'ebt.id_jenisebt', '=', 'jen.id_jenisebt')
                        ->where('ebt.id_ebt', $id)->first();

        return view('dapur.ebt.edit', $data);
    }

    public function saveupdate(Request $req){
        $id_ebt = $req->post('id_ebt');
        $id_jenisebt = $req->post('id_jenisebt');
        $kapasitas = $req->post('kapasitas');
        $produksi = $req->post('produksi');
        $energi = $req->post('energi');
        $sumberdata = $req->post('sumberdata');

        $data = ['id_jenisebt' => $id_jenisebt, 
                 'kapasitas' => $kapasitas,
                 'produksi' => $produksi,
                 'energi' => $energi,
                 'sumberdata' => $sumberdata,
                 'updated_at' => date('Y-m-d H:i:s'),
                ];
        
        try{
            $simpan = DB::table('ebt')->where('id_ebt', $id_ebt)->update($data);

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

        $hapus = DB::table('ebt')->where('id_ebt', $id)->delete();

        if ($hapus){
            $response = ['result'=>'success', 'message'=>'Deleting data successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Deleteting data failed'];
        }

        return response()->json($response);
    }
}
