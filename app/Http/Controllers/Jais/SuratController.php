<?php

namespace App\Http\Controllers\Jais;

use App\Http\Controllers\Controller;
use App\Ref_Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());

        $email = Ref_Surat::where('is_delete',0);

        if(!empty($request->type)){ $email->where('type',$request->type); }

        if(!empty($request->carian)){ $email->where('kandugan_1','LIKE','%'.$request->carian.'%')->orWhere('kandungan_2','LIKE','%'.$request->carian.'%'); }

        $email = $email->paginate(5);

        return view('admin/surat',compact('email'));
    }

    public function edit(Request $request, $id)
    {
        // dd($id);
        // dd($request->all());

        $type = $request->type;
        $surat = Ref_Surat::find($id);

        return view('admin/modal_surat',compact('type','surat'));
    }

    public function simpan(Request $request)
    {
        // dd($request->all());

        if($request->kandungan_type == 'k1'){
            if($request->type){
                $data = array(
                    'perkara'=>$request->perkara,
                    'no_rujukan'=>$request->no_rujukan,
                    'kandungan_1'=>$request->k1,
                );
            } else {
                $data = array(
                    'perkara'=>$request->perkara,
                    'kandungan_1'=>$request->k1,
                );
            }
        } else {
            if($request->type){
                $data = array(
                    'kandungan_2'=>$request->k1,
                );
            } else {
                $data = array(
                    'kandungan_2'=>$request->k1,
                );
            }
        }

        $sql = Ref_Surat::find($request->surat_id)->update($data);

        if($sql){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }
}
