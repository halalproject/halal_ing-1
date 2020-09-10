<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ref_User_Jawatan;
use App\Ref_User_Level;
use App\Ref_User_Status;
use App\Admin;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $rsl = Ref_User_Level::where('status',0)->get();
        
        $rss = Ref_User_Status::where('status',0)->get();

        $user = Admin::where('is_delete',0);
        
        if(!empty($request->status)){ $user->where('user_status',$request->status); }
        if(!empty($request->level)){ $user->where('user_level',$request->level); }
        if(!empty($request->carian)){ $user->where('username','LIKE','%'.$request->carian.'%'); }

        $user = $user->paginate(10);
        return view('admin/staff',compact('rsl','rss','user'));
    }

    public function create()
    {
        $rsj = Ref_User_Jawatan::where('status',0)->get();

        $rsl = Ref_User_Level::where('status',0)->get();
        
        $rss = Ref_User_Status::where('status',0)->get();

        return view('admin/modal_staff',compact('rsj','rsl','rss'));
    }

    public function edit($id)
    {
        // dd($id);
        $rsj = Ref_User_Jawatan::where('status',0)->get();

        $rsl = Ref_User_Level::where('status',0)->get();
        
        $rss = Ref_User_Status::where('status',0)->get();

        $user = Admin::find($id);

        return view('admin/modal_staff',compact('rsj','rsl','rss','user'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        if(empty($request->id)){
            // dd('empty');

            $check = Admin::where('nombor_kp',$request->no_kp)->first();

            if(!empty($check)){
                return response()->json('ADA');
            } else {
                $user = new Admin();
                $user->userid = $request->no_kp;
                $user->password = md5($request->no_kp);
                $user->nombor_kp = $request->no_kp;
                $user->username = $request->nama;
                $user->email = $request->email;
                $user->nombor_tel = $request->no_telefon;
                $user->nombor_hp = $request->no_hp;
                $user->user_jawatan = $request->jawatan;
                $user->user_level = $request->level;
                $user->user_status = $request->status;
                $user->created_dt = now();
                $user->created_by = 1;
                $user->updated_dt = now();
                $user->updated_by = 1;
    
                $user->save();

                if($user){
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
                'updated_by' => 1,
            );

            $user = Admin::where('id',$request->id)->update($data);

            if($user){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        }

        return view('admin/modal_staff');
    }

    public function reset($id)
    {
        // dd($id);

        $password = Admin::find($id);
        // dd($password->nombor_kp);
        $user = Admin::find($id)->update(['password'=> md5($password->nombor_kp)]);

        if($user){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }

    public function delete($id)
    {
        // dd($id);
        $user = Admin::find($id)->update(['is_delete'=> 1]);

        if($user){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }
}
