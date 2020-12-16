<?php

namespace App\Http\Controllers\Jais;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\AuditTrail;
use App\Ref_User_Jawatan;
use App\Ref_User_Level;
use App\Ref_User_Status;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function profile()
    {
        $rsj = Ref_User_Jawatan::where('status',0)->get();

        $rsl = Ref_User_Level::where('status',0)->get();

        $rss = Ref_User_Status::where('status',0)->get();

        // $user = Admin::find($id);

        $user = Auth::guard('admin')->user();

        return view('jais/profile',compact('rsj','rsl','rss','user'));
    }

    public function store(Request $request)
    {
        DB::enableQueryLog();

        // dd($request->all());

        $data = array(
            'username' => $request->nama,
            'nombor_kp' => $request->no_kp,
            'user_level' => $request->level,
            'user_jawatan' => $request->jawatan,
            'email' => $request->email,
            'nombor_tel' => $request->no_telefon,
            'nombor_hp' => $request->no_hp,
            'user_status' => $request->status,
            'updated_dt' => now(),
            'updated_by' => $request->id,
        );

        $user = Admin::find($request->id)->update($data);

        //Auditrail
        $query = DB::getQueryLog()[1];
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
        $user = Auth::guard('admin')->user();

        return view('jais/password',compact('user'));
    }

    public function reset(Request $request)
    {
        DB::enableQueryLog();
        // dd($request->all());

        $user = Admin::find($request->id)->update(['password'=>md5($request->new_pass)]);

        //Auditrail
        $query = DB::getQueryLog()[1];
        $query = vsprintf(str_replace('?', '`%s`', $query['query']), $query['bindings']);

        $audit = new AuditTrail();
        $audit->userid = $user;
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
