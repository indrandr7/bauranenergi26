<?php

namespace App\Http\Controllers\dapur;

use Illuminate\Http\Request;
use App\Helpers\Gudangfungsi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class KetenagalistrikanController extends Controller
{
    public function index(){
        $data['judulhalaman'] = 'Ketenagalistrikan';

        return view('dapur.ketenagalistrikan.index', $data);
    }

    public function getList(){
        $data = DB::table('listrik as lis')
                ->join('listrik_jenis as jen', 'lis.id_jenislistrik', '=', 'jen.id_jenislistrik')
                ->orderBy('lis.created_at', 'desc')->get();

        $datatable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('jenislistrik', function($row){
                return '<p class="ndrparagraf">'.$row->jenis_listrik.'</p>';
            })
            ->addColumn('action', function($row){
                $actionBtn = '<button type="button" onclick="showFormedit(\''.$row->id_jenislistrik.'\')" title="Edit" class="btn btn-sm waves-effect waves-light btn-info m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <button type="button" onclick="hapus(\''.$row->id_jenislistrik.'\')" title="Hapus" class="btn btn-sm waves-effect waves-light btn-danger m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-trash-2"></i>
                            </button>';
                return $actionBtn;
            })
            ->rawColumns(['jenislistrik', 'action'])
            ->make(true);
        
        return $datatable;
    }

    public function add(){
        $data['judulmodal'] = 'Tambah Ketenagalistrikan';
        $data['jenislistrik'] = DB::table('listrik_jenis')->orderBy('jenis_listrik', 'asc');

        return view('dapur.ketenagalistrikan.add', $data);
    }

    public function save(Request $req){
        $id_jenislistrik = $req->post('id_jenislistrik');
        $id_pengguna = Auth::user()->id;
        $pembangkit = $req->post('pembangkit');
        $produksi = $req->post('produksi');
        $sumberdata = $req->post('sumberdata');

        $data = ['id_jenislistrik' => $id_jenislistrik, 
                 'pembangkit' => $pembangkit,
                 'produksi' => $produksi,
                 'sumberdata' => $sumberdata,
                 'created_at' => date('Y-m-d H:i:s'),
                ];
        
        try{
            $simpan = DB::table('listrik')->insert($data);

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

        $data['judulmodal'] = 'Edit Ketenagalistrikan';
        $data['jenislistrik'] = DB::table('listrik_jenis')->orderBy('jenis_listrik', 'asc');
        $data['data'] = DB::table('listrik as lis')
                        ->join('listrik_jenis as jen', 'lis.id_jenislistrik', '=', 'jen.id_jenislistrik')
                        ->where('lis.id_listrik', $id)->first();

        return view('dapur.ketenagalistrikan.edit', $data);
    }

    public function saveupdate(Request $req){
        $id_listrik = $req->post('id_listrik');
        $id_jenislistrik = $req->post('id_jenislistrik');
        $id_pengguna = Auth::user()->id;
        $pembangkit = $req->post('pembangkit');
        $produksi = $req->post('produksi');
        $sumberdata = $req->post('sumberdata');

        $data = ['id_jenislistrik' => $id_jenislistrik, 
                 'pembangkit' => $pembangkit,
                 'produksi' => $produksi,
                 'sumberdata' => $sumberdata,
                 'created_at' => date('Y-m-d H:i:s'),
                ];
        
        try{
            $simpan = DB::table('listrik')->where('id_listrik', $id_listrik)->update($data);

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

        $hapus = DB::table('listrik')->where('id_listrik', $id)->delete();

        if ($hapus){
            $response = ['result'=>'success', 'message'=>'Deleting data successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Deleteting data failed'];
        }

        return response()->json($response);
    }
}
