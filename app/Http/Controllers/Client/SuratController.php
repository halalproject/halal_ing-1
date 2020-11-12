<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\Http\Controllers\Controller;
use App\Ramuan;
use App\Ramuan_Komen;
use App\Ref_Surat;
use Illuminate\Http\Request;
use PDF;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());

        $ramuan = Ramuan::find($request->ids);
        // dd($ramuan);

        $syarikat = Client::where('userid',$ramuan->create_by)->first();
        // dd($syarikat);

        $surat = Ref_Surat::where('type',$request->type)->where('kod',$request->kod)->first();
        // dd($surat);

        $komen = Ramuan_Komen::where('ramuan_id',$request->ids)->first();
        // dd($komen);

        return view('surat',compact('ramuan','syarikat','surat','komen'));
    }
}
