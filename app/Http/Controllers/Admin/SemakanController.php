<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ref_Sumber_Bahan;
use App\Ramuan;
use App\Ramuan_Komen;

class SemakanController extends Controller
{
    public function index(Request $request)
    {
        $cat = Ref_Sumber_Bahan::get();
        $semakan = Ramuan::where('status',1)->whereNotNull('tarikh_buka')->where('is_semak',0);

        if(!empty($request->sijil)){ $semakan->where('is_sijil',$request->sijil); }
        if(!empty($request->kategori)){ $semakan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $semakan->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%'); }

        $semakan = $semakan->orderBy('create_dt')->paginate(10);

        return view('admin/semakan',compact('cat','semakan'));
    }

    public function komen(Request $request)
    {
        // dd($request->all());

        if ($request->input('lulus') || $request->input('semak')) {
            // dd('lulus dan semak');

            $komen = new Ramuan_Komen();
            $komen->ramuan_id = $request->id;
            if ($request->input('lulus')) {
                $komen->komen_type = 'LULUS';
            } else if($request->input('semak')) {
                $komen->komen_type = 'SEMAK';
            }
            $komen->catatan = $request->catatan_text;
            $komen->create_dt = now();
            $komen->create_by = 1;
            $komen->update_dt = now();
            $komen->update_by = 1;

            $komen->save();

            if($komen){
                if ($request->input('lulus')) {
                    $status = Ramuan::find($request->id)->update(['status'=>3,'is_semak'=>1,'is_lulus'=>1]);
                } else if($request->input('semak')) {
                    $status = Ramuan::find($request->id)->update(['is_semak'=>1]);
                }

                return response()->json('OK');

            } else {
                return response()->json('ERR');
            }

        } else if($request->input('tolak')) {
            // dd('tolak');
            $tolak = Ramuan::find($request->id)->update(['status'=>6,'is_lulus'=>2]);

            if($tolak){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        }

    }

    public function modal_permohonan($id)
    {
        // dd($id);
        $rs = Ramuan::find($id);
        return view('admin/modal_permohonan',compact('rs'));
    }
}
