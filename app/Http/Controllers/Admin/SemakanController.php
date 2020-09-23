<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ref_Sumber_Bahan;
use App\Ramuan;
use App\Ramuan_Komen;

class SemakanController extends Controller
{
    public function index(Request $request)
    {
        $cat = Ref_Sumber_Bahan::get();
        $semakan = Ramuan::where('status',1)->whereNotNull('tarikh_buka')->where('is_semak',0);

        if($request->sijil != ''){ $semakan->where('is_sijil',$request->sijil); }
        if($request->kategori != ''){ $semakan->where('sumber_bahan_id',$request->kategori); }
        if(!empty($request->carian)){ $semakan->where(function($query) use ($request){
            $query->where('nama_ramuan','LIKE','%'.$request->carian.'%')->orWhere('nama_saintifik','LIKE','%'.$request->carian.'%')->orWhere('nama_pengilang','LIKE','%'.$request->carian.'%')->orWhere('ing_kod','LIKE','%'.$request->carian.'%');
        }); }

        $semakan = $semakan->orderBy('create_dt')->paginate(10);

        return view('admin/semakan',compact('cat','semakan'));
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
            $komen->create_by = $user;
            $komen->update_dt = now();
            $komen->update_by = $user;

            $komen->save();

            if($komen){
                if ($request->input('lulus')) {
                    $status = Ramuan::find($request->id)->update(['status'=>3,'is_semak'=>1,'is_semak_by'=>$user,'tkh_semak'=>now(),'is_lulus'=>1,'is_lulus_by'=>$user,'tkh_lulus'=>now()]);
                } else if($request->input('semak')) {
                    $status = Ramuan::find($request->id)->update(['is_semak'=>1,'is_semak_by'=>$user,'tkh_semak'=>now()]);
                }

                return response()->json('OK');

            } else {
                return response()->json('ERR');
            }

        } else if($request->input('tolak')) {
            // dd('tolak');
            $tolak = Ramuan::find($request->id)->update(['status'=>6,'is_semak'=>1,'is_semak_by'=>$user,'tkh_semak'=>now(),'is_lulus'=>2,'is_lulus_by'=>$user,'tkh_lulus'=>now()]);

            if($tolak){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        }

    }

}
