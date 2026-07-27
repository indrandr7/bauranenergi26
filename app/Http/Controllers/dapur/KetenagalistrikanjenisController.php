<?php

namespace App\Http\Controllers\dapur;

use App\Helpers\Gudangfungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class KetenagalistrikanjenisController extends Controller
{
    public function index(){
        $data['judulhalaman'] = 'Jenis Energi yang Digunakan';

        return view('dapur.ketenagalistrikanjenis.index', $data);
    }

    public function getList(){
        $data = DB::table('listrik_jenis')->orderBy('created_at', 'asc')->get();

        $datatable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<button type="button" onclick="showFormedit(\''.$row->id_jenislistrik.'\')" title="Edit" class="btn btn-sm waves-effect waves-light btn-info m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <button type="button" onclick="hapus(\''.$row->id_jenislistrik.'\')" title="Hapus" class="btn btn-sm waves-effect waves-light btn-danger m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-trash-2"></i>
                            </button>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        
        return $datatable;
    }

    public function add(){
        $data['judulmodal'] = 'Tambah Energi yang Digunakan';

        return view('dapur.ketenagalistrikanjenis.add', $data);
    }

    public function save(Request $req){
        $jenis_listrik = $req->post('jenis_listrik');

        $data = ['jenis_listrik' => $jenis_listrik, 
                 'created_at' => date('Y-m-d H:i:s'),
                ];
        $simpan = DB::table('listrik_jenis')->insert($data);

        if ($simpan){
            $response = ['result'=>'success', 'message'=>'Save successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Save failed'];
        }

        return response()->json($response);
    }

    public function edit(Request $req){
        $id = $req->get('id');

        $data['judulmodal'] = 'Edit Jenis Energi yang Digunakan';
        $data['data'] = DB::table('listrik_jenis')->where('id_jenislistrik', $id)->first();

        return view('dapur.ketenagalistrikanjenis.edit', $data);
    }

    public function saveupdate(Request $req){
        $id_jenislistrik = $req->post('id_jenislistrik');
        $jenis_listrik = $req->post('jenis_listrik');

        $data = ['jenis_listrik' => $jenis_listrik, 
                 'updated_at' => date('Y-m-d H:i:s'),
                ];
        $simpan = DB::table('listrik_jenis')->where('id_jenislistrik', $id_jenislistrik)->update($data);

        if ($simpan){
            $response = ['result'=>'success', 'message'=>'Save successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Save failed'];
        }

        return response()->json($response);
    }

    public function delete(Request $req){
        $id = $req->post('id');
        
        $hapus = DB::table('listrik_jenis')->where('id_jenislistrik', $id)->delete();

        if ($hapus){
            $response = ['result'=>'success', 'message'=>'Deleting data successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Deleteting data failed'];
        }

        return response()->json($response);
    }
}
