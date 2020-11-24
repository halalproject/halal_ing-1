<?php

namespace App\Http\Controllers\Jais;

use App\Http\Controllers\Controller;
use App\Ref_Islamic_Body;
use App\Ref_Negara;
use Illuminate\Http\Request;

class CBController extends Controller
{
    public function index(Request $request)
    {

        $rsn = Ref_Negara::where('status',0)->get();

        $cb = Ref_Islamic_Body::where('is_deleted',0)->where('fldm','<>',1);

        if(!empty($request->negara)){
            $cb->where('fldcountryid',$request->negara);
        }
        if($request->status != ''){
            $cb->where('fldstatus',$request->status);
        }
        if(!empty($request->carian)){
            $cb->where('fldname','LIKE','%'.$request->carian.'%');
        }
        
        $cb = $cb->orderBy('fldid')->paginate(10);

        return view('jais/cb',compact('rsn','cb'));
    }

    public function edit()
    {
        return view('jais/modal_cb');
    }

    public function sync()
    {
        $url = url('http://sistem.halal.gov.my/myehalal/admin_ingredient/get_cb.php');
        $html = file_get_contents($url);
        $data = json_decode($html);

        // dd($data);
        try {
            foreach($data as $data){      
                $sql = Ref_Islamic_Body::updateOrCreate(
                    ['fldid'=>$data->fldid],
                    [
                        'fldname'=>$data->fldname,
                        'fldaddress1'=>$data->fldaddress1,
                        'fldaddress2'=>$data->fldaddress2,
                        'fldaddress3'=>$data->fldaddress3,
                        'fldposkod'=>$data->fldposkod,
                        'fldbandar'=>$data->fldbandar,
                        'fldstate'=>$data->fldstate,
                        'fldcountryid'=>$data->fldcountry,
                        'fldno_tel'=>$data->fldno_tel,
                        'fldno_fax'=>$data->fldno_fax,
                        'fldstatus'=>$data->fldstatus,
                        'is_deleted'=>$data->is_deleted,
                        'fldcreate_dt'=>$data->fldcreate_dt,
                        'fldcreate_by'=>$data->fldcreate_by,
                        'fldupdate_dt'=>$data->fldupdate_dt,
                        'fldupdate_by'=>$data->fldupdate_by,
                        'fldm'=>$data->fldm,
                    ]
                );
            }

            return response()->json('OK');
        } catch (\Throwable $th) {
            return response()->json('ERR');
        }
    }
}
