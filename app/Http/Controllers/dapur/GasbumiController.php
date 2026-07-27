<?php

namespace App\Http\Controllers\dapur;

use Illuminate\Http\Request;
use App\Helpers\Gudangfungsi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class GasbumiController extends Controller
{
    public function index(){
        $data['judulhalaman'] = 'Gas Bumi';

        return view('dapur.gasbumi.index', $data);
    }

    public function getList(){
        $data = DB::table('gasbumi as gas')
                ->join('gasbumi_jenis as jen', 'gas.id_jenisgasbumi', '=', 'jen.id_jenisgasbumi')
                ->join('gasbumi_sektor as sek', 'gas.id_sektorgasbumi', '=', 'sek.id_sektorgasbumi')
                ->orderBy('gas.created_at', 'desc')->get();

        $datatable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('jenisgasbumi', function($row){
                return '<p class="ndrparagraf">'.$row->jenis_gasbumi.'</p>';
            })
            ->addColumn('sektorgasbumi', function($row){
                return '<p class="ndrparagraf">'.$row->sektor_gasbumi.'</p>';
            })
            ->addColumn('action', function($row){
                $actionBtn = '<button type="button" onclick="showFormedit(\''.$row->id_gasbumi.'\')" title="Edit" class="btn btn-sm waves-effect waves-light btn-info m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-edit-2"></i>
                            </button>
                            <button type="button" onclick="hapus(\''.$row->id_gasbumi.'\')" title="Hapus" class="btn btn-sm waves-effect waves-light btn-danger m-b-0 " style="padding-bottom: 0px;padding-top:0px;">
                                <i class="feather icon-trash-2"></i>
                            </button>';
                return $actionBtn;
            })
            ->rawColumns(['jenisgasbumi', 'sektorgasbumi', 'action'])
            ->make(true);
        
        return $datatable;
    }

    public function add(){
        $data['judulmodal'] = 'Tambah Gas Bumi';
        $data['jenisgasbumi'] = DB::table('gasbumi_jenis')->orderBy('jenis_gasbumi', 'asc');
        $data['sektorgasbumi'] = DB::table('gasbumi_sektor')->orderBy('sektor_gasbumi', 'asc');

        return view('dapur.gasbumi.add', $data);
    }

    public function save(Request $req){
        $id_jenisgasbumi = $req->post('id_jenisgasbumi');
        $id_sektorgasbumi = $req->post('id_sektorgasbumi');
        $id_pengguna = Auth::user()->id;
        $volume = $req->post('volume');
        $penyedia = $req->post('penyedia');

        $data = ['id_jenisgasbumi' => $id_jenisgasbumi, 
                 'id_sektorgasbumi' => $id_sektorgasbumi,
                 'volume' => $volume,
                 'penyedia' => $penyedia,
                 'created_at' => date('Y-m-d H:i:s'),
                ];
        
        try{
            $simpan = DB::table('gasbumi')->insert($data);

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

        $data['judulmodal'] = 'Edit Gas Bumi';
        $data['jenisgasbumi'] = DB::table('gasbumi_jenis')->orderBy('jenis_gasbumi', 'asc');
        $data['sektorgasbumi'] = DB::table('gasbumi_sektor')->orderBy('sektor_gasbumi', 'asc');
        $data['data'] = DB::table('gasbumi as gas')
                        ->join('gasbumi_jenis as jen', 'gas.id_jenisgasbumi', '=', 'jen.id_jenisgasbumi')
                        ->join('gasbumi_sektor as sek', 'gas.id_sektorgasbumi', '=', 'sek.id_sektorgasbumi')
                        ->where('gas.id_gasbumi', $id)->first();

        return view('dapur.gasbumi.edit', $data);
    }

    public function saveupdate(Request $req){
        $id_gasbumi = $req->post('id_gasbumi');
        $id_jenisgasbumi = $req->post('id_jenisgasbumi');
        $id_sektorgasbumi = $req->post('id_sektorgasbumi');
        $id_pengguna = Auth::user()->id;
        $volume = $req->post('volume');
        $penyedia = $req->post('penyedia');

        $data = ['id_jenisgasbumi' => $id_jenisgasbumi, 
                 'id_sektorgasbumi' => $id_sektorgasbumi,
                 'volume' => $volume,
                 'penyedia' => $penyedia,
                 'updated_at' => date('Y-m-d H:i:s'),
                ];
        
        try{
            $simpan = DB::table('gasbumi')->where('id_gasbumi', $id_gasbumi)->update($data);

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

        $hapus = DB::table('gasbumi')->where('id_gasbumi', $id)->delete();

        if ($hapus){
            $response = ['result'=>'success', 'message'=>'Deleting data successfully'];
        }else{
            $response = ['result'=>'failed', 'message'=>'Deleteting data failed'];
        }

        return response()->json($response);
    }
}
