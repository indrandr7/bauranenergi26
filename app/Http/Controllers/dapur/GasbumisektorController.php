<?php

namespace App\Http\Controllers\dapur;

use App\Helpers\Gudangfungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class GasbumisektorController extends Controller
{
    public function index(){
        $data['judulhalaman'] = 'Sektor Gas Bumi';

        return view('dapur.gasbumi_sektor.index', $data);
    }

    public function getList(){
        $data = DB::table('gasbumi_sektor')->orderBy('created_at', 'asc')->get();

        $datatable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<button type="button" onclick="showFormedit(\''.$row->id_sektorgasbumi.'\')" title="Edit" class="btn btn-sm waves-effect waves-light btn-info m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <button type="button" onclick="hapus(\''.$row->id_sektorgasbumi.'\')" title="Hapus" class="btn btn-sm waves-effect waves-light btn-danger m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-trash-2"></i>
                            </button>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        
        return $datatable;
    }

    public function add(){
        $data['judulmodal'] = 'Tambah Sektor Gas Bumi';

        return view('dapur.gasbumi_sektor.add', $data);
    }

    public function save(Request $req){
        $sektor_gasbumi = $req->post('sektor_gasbumi');

        $data = ['sektor_gasbumi' => $sektor_gasbumi, 
                 'created_at' => date('Y-m-d H:i:s'),
                ];
        $simpan = DB::table('gasbumi_sektor')->insert($data);

        if ($simpan){
            $response = ['result'=>'success', 'message'=>'Save successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Save failed'];
        }

        return response()->json($response);
    }

    public function edit(Request $req){
        $id = $req->get('id');

        $data['judulmodal'] = 'Edit Sektor Gas Bumi';
        $data['data'] = DB::table('gasbumi_sektor')->where('id_sektorgasbumi', $id)->first();

        return view('dapur.gasbumi_sektor.edit', $data);
    }

    public function saveupdate(Request $req){
        $id_sektorgasbumi = $req->post('id_sektorgasbumi');
        $sektor_gasbumi = $req->post('sektor_gasbumi');

        $data = ['sektor_gasbumi' => $sektor_gasbumi, 
                 'updated_at' => date('Y-m-d H:i:s'),
                ];
        $simpan = DB::table('gasbumi_sektor')->where('id_sektorgasbumi', $id_sektorgasbumi)->update($data);

        if ($simpan){
            $response = ['result'=>'success', 'message'=>'Save successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Save failed'];
        }

        return response()->json($response);
    }

    public function delete(Request $req){
        $id = $req->post('id');
        
        $hapus = DB::table('gasbumi_sektor')->where('id_sektorgasbumi', $id)->delete();

        if ($hapus){
            $response = ['result'=>'success', 'message'=>'Deleting data successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Deleteting data failed'];
        }

        return response()->json($response);
    }
}
