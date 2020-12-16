<?php

namespace App\Http\Controllers\Client;

use App\AuditTrail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Client;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function profile()
    {
        // dd('hello');

        $user = Auth::guard('client')->user();

        return view('client/profile',compact('user'));
    }

    public function store(Request $request)
    {
        DB::enableQueryLog();

        // dd($request->all());

        $data = array(
            'company_web' => $request->company_web,
            'company_fax' => $request->company_fax,
            'company_email' => $request->company_email,
            'company_tel' => $request->company_tel,
            'contact_name' => $request->contact_name,
            'contact_ic' => $request->contact_ic,
            'contact_position' => $request->contact_position,
            'contact_tel' => $request->contact_tel,
            'contact_email' => $request->contact_email,
        );

        $user = Client::where('userid',$request->id)->update($data);

        //Auditrail
        $query = DB::getQueryLog()[0];
        $query = vsprintf(str_replace('?', '`%s`', $query['query']), $query['bindings']);

        $audit = new AuditTrail();
        $audit->userid = $request->id;
        $audit->ip = $request->ip();
        $audit->date = now();
        $audit->action = $query;

        $audit->save();

        if($user){
            return response()->json('OK');
        } else {
            return response()->json('Err');
        }
    }

    public function password()
    {
        $user = Auth::guard('client')->user();

        return view('client/password',compact('user'));
    }

    public function reset(Request $request)
    {
        DB::enableQueryLog();

        // dd($request->all());
        $user = Client::where('userid',$request->id)->update(['password'=>md5($request->new_pass)]);

        //Auditrail
        $query = DB::getQueryLog()[0];
        $query = vsprintf(str_replace('?', '`%s`', $query['query']), $query['bindings']);

        $audit = new AuditTrail();
        $audit->userid = $request->id;
        $audit->ip = $request->ip();
        $audit->date = now();
        $audit->action = $query;

        $audit->save();

        if($user){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }
}
