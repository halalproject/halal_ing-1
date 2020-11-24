<?php

namespace App\Http\Controllers\Jais;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ref_User_Jawatan;
use App\Ref_User_Level;
use App\Ref_User_Status;
use App\Admin;
use App\AuditTrail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $rsl = Ref_User_Level::where('status',0)->get();
        
        $rss = Ref_User_Status::where('status',0)->get();

        $user = Admin::where('is_delete',0);
        
        if(!empty($request->status)){ $user->where('user_status',$request->status); }
        if(!empty($request->level)){ $user->where('user_level',$request->level); }
        if(!empty($request->carian)){ $user->where('username','LIKE','%'.$request->carian.'%')->orWhere('email','LIKE','%'.$request->carian.'%')->orWhere('nombor_hp','LIKE','%'.$request->carian.'%'); }

        $user = $user->paginate(10);
        return view('jais/staff',compact('rsl','rss','user'));
    }

    public function create()
    {
        $rsj = Ref_User_Jawatan::where('status',0)->get();

        $rsl = Ref_User_Level::where('status',0)->get();
        
        $rss = Ref_User_Status::where('status',0)->get();

        return view('jais/modal_staff',compact('rsj','rsl','rss'));
    }

    public function edit($id)
    {
        // dd($id);
        $rsj = Ref_User_Jawatan::where('status',0)->get();

        $rsl = Ref_User_Level::where('status',0)->get();
        
        $rss = Ref_User_Status::where('status',0)->get();

        $user = Admin::find($id);

        return view('jais/modal_staff',compact('rsj','rsl','rss','user'));
    }

    public function store(Request $request)
    {
        DB::enableQueryLog();
        // dd($request->all());
        $user = Auth::guard('admin')->user()->id;

        if(empty($request->id)){
            // dd('empty');

            $check = Admin::where('nombor_kp',$request->no_kp)->first();

            if(!empty($check)){
                return response()->json('ADA');
            } else {
                $u = new Admin();
                $u->userid = $request->no_kp;
                $u->password = md5($request->no_kp);
                $u->nombor_kp = $request->no_kp;
                $u->username = $request->nama;
                $u->email = $request->email;
                $u->nombor_tel = $request->no_telefon;
                $u->nombor_hp = $request->no_hp;
                $u->user_jawatan = $request->jawatan;
                $u->user_level = $request->level;
                $u->user_status = $request->status;
                $u->created_dt = now();
                $u->created_by = $user;
                $u->updated_dt = now();
                $u->updated_by = $user;
    
                $u->save();

                // Mail::to($request->email)->send(new StaffMail());

                if($u){
                    return response()->json('OK');
                } else {
                    return response()->json('ERR');
                }
            }
        } else {
            $data = array(
                'userid' => $request->no_kp,
                'nombor_kp' => $request->no_kp,
                'username' => $request->nama,
                'email' => $request->email,
                'nombor_tel' => $request->no_telefon,
                'nombor_hp' => $request->no_hp,
                'user_jawatan' => $request->jawatan,
                'user_level' => $request->level,
                'user_status' => $request->status,
                'updated_dt' => now(),
                'updated_by' => $user,
            );

            $u = Admin::where('id',$request->id)->update($data);

            $query = DB::getQueryLog()[0];
            $query = vsprintf(str_replace('?', '`%s`', $query['query']), $query['bindings']);

            $audit = new AuditTrail();
            $audit->userid = $user;
            $audit->ip = $request->ip();
            $audit->date = now();
            $audit->action = $query;

            $audit->save();

            if($u){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        }

        return view('jais/modal_staff');
    }

    public function reset($id)
    {
        // dd($id);
        $uid = Auth::guard('admin')->user()->id;

        $password = Admin::find($id);
        // dd($password->nombor_kp);
        $user = Admin::find($id)->update(['password'=> md5($password->nombor_kp),'updated_by' => $uid,'updated_dt' => now()]);

        if($user){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }

    public function delete($id)
    {
        $uid = Auth::guard('admin')->user()->id;
        // dd($id);
        $user = Admin::find($id)->update(['is_delete' => 1,'deleted_by' => $uid,'deleted_dt' => now()]);

        if($user){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }
}
