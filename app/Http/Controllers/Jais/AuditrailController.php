<?php

namespace App\Http\Controllers\Jais;

use App\AuditTrail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuditrailController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $auditrail = AuditTrail::whereNotNull('userid');

        if(!empty($request->tarikh)){ $auditrail->where('date','LIKE','%'.$request->tarikh.'%'); }
        if(!empty($request->carian)){ $auditrail->where('action','LIKE','%'.$request->carian.'%'); }

        $auditrail = $auditrail->orderBy('date','DESC')->paginate(10);

        return view('jais/auditrail',compact('auditrail'));
    }
}
