<?php

namespace App\Http\Controllers\Jais;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Ref_User_Jawatan;
use App\Ref_User_Level;
use App\Ref_User_Status;

class AdminController extends Controller
{
    public function profile()
    {
        $rsj = Ref_User_Jawatan::where('status',0)->get();

        $rsl = Ref_User_Level::where('status',0)->get();
        
        $rss = Ref_User_Status::where('status',0)->get();

        // $user = Admin::find($id);

        $user = Auth::guard('admin')->user();

        return view('admin/profile',compact('rsj','rsl','rss','user'));
    }

    public function password()
    {
        $user = Auth::guard('admin')->user();

        return view('admin/password',compact('user'));
    }
    
    public function reset(Request $request)
    {
        // dd($request->all());

        $user = Admin::find($request->id)->update(['password'=>md5($request->new_pass)]);

        if($user){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }

    }
}
