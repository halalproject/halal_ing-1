<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ref_Sumber_Bahan;
use App\Ramuan;
use App\Ramuan_Komen;

class KelulusanController extends Controller
{
    public function index(Request $request)
    {
        $cat = Ref_Sumber_Bahan::get();
        $kelulusan = Ramuan::where('status',1)->where('is_semak',1);

        if($request->sijil != ''){ $kelulusan->where('is_sijil',$request->sijil); }
        if($request->kategori != ''){ $kelulusan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $kelulusan->where(function($query) use ($request){
            $query->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%')->orWhere('nama_pengilang','LIKE','%'.$request->carian.'%')->orWhere('ing_kod','LIKE','%'.$request->carian.'%');
        }); }

        $kelulusan = $kelulusan->orderBy('create_dt')->paginate(10);

        return view('admin/kelulusan',compact('cat','kelulusan'));
    }

    public function modal_permohonan($id)
    {
        // dd($id);
        $rs = Ramuan::find($id);
        return view('admin/modal_permohonan',compact('rs'));
    }
    
    public function komen(Request $request)
    {
        // dd($request->all());
        $user = Auth::guard('admin')->user()->id;

        if ($request->input('lulus')) {
            // dd('lulus dan semak');

            $komen = new Ramuan_Komen();
            $komen->ramuan_id = $request->id;
            $komen->komen_type = 'LULUS';
            $komen->catatan = $request->catatan_text;
            $komen->create_dt = now();
            $komen->create_by = $user;
            $komen->update_dt = now();
            $komen->update_by = $user;

            $komen->save();

            if($komen){
                $status = Ramuan::find($request->id)->update(['status'=>3,'is_lulus'=>1,'is_lulus_by'=>$user,'tkh_lulus'=>now()]);

                return response()->json('OK');

            } else {
                return response()->json('ERR');
            }

        } else if($request->input('tolak')) {
            // dd('tolak');
            $tolak = Ramuan::find($request->id)->update(['status'=>6,'is_lulus'=>2,'is_lulus_by'=>$user,'tkh_lulus'=>now()]);

            if($tolak){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        }

    }

}
