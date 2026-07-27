<?php

namespace App\Http\Controllers\dapur;

use App\Helpers\Gudangfungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class BbmjenisController extends Controller
{
    public function index(){
        $data['judulhalaman'] = 'Jenis BBM';

        return view('dapur.bbm_jenis.index', $data);
    }

    public function getList(){
        $data = DB::table('bbm_jenis')->orderBy('created_at', 'asc')->get();

        $datatable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<button type="button" onclick="showFormedit(\''.$row->id_jenisbbm.'\')" title="Edit" class="btn btn-sm waves-effect waves-light btn-info m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <button type="button" onclick="hapus(\''.$row->id_jenisbbm.'\')" title="Hapus" class="btn btn-sm waves-effect waves-light btn-danger m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-trash-2"></i>
                            </button>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        
        return $datatable;
    }

    public function add(){
        $data['judulmodal'] = 'Tambah Jenis BBM';

        return view('dapur.bbm_jenis.add', $data);
    }

    public function save(Request $req){
        $jenis_bbm = $req->post('jenis_bbm');

        $data = ['jenis_bbm' => $jenis_bbm, 
                 'created_at' => date('Y-m-d H:i:s'),
                ];
        $simpan = DB::table('bbm_jenis')->insert($data);

        if ($simpan){
            $response = ['result'=>'success', 'message'=>'Save successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Save failed'];
        }

        return response()->json($response);
    }

    public function edit(Request $req){
        $id = $req->get('id');

        $data['judulmodal'] = 'Edit Jenis BBM';
        $data['data'] = DB::table('bbm_jenis')->where('id_jenisbbm', $id)->first();

        return view('dapur.bbm_jenis.edit', $data);
    }

    public function saveupdate(Request $req){
        $id_jenisbbm = $req->post('id_jenisbbm');
        $jenis_bbm = $req->post('jenis_bbm');

        $data = ['jenis_bbm' => $jenis_bbm, 
                 'updated_at' => date('Y-m-d H:i:s'),
                ];
        $simpan = DB::table('bbm_jenis')->where('id_jenisbbm', $id_jenisbbm)->update($data);

        if ($simpan){
            $response = ['result'=>'success', 'message'=>'Save successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Save failed'];
        }

        return response()->json($response);
    }

    public function delete(Request $req){
        $id = $req->post('id');
        
        $hapus = DB::table('bbm_jenis')->where('id_jenisbbm', $id)->delete();

        if ($hapus){
            $response = ['result'=>'success', 'message'=>'Deleting data successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Deleteting data failed'];
        }

        return response()->json($response);
    }
}
