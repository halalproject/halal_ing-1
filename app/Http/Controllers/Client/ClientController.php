<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Client;

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
        // dd($request->all());
        $user = Client::where('userid',$request->id)->update(['password'=>md5($request->new_pass)]);

        if($user){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }
}
