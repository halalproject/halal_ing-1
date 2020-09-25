<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ramuan;
use App\Calendar_Event;
use App\Visitor_Count;

class PortalController extends Controller
{
    public function index(Request $request)
    {        
        $this->visitors();

        $pengumuman = Calendar_Event::where('kategori',1)->where('is_public',1)->whereRaw('"'.date('Y-m-d').'"  between `start_date` and `end_date`')->get();

        $today = Visitor_Count::where('type','today')->first();
        $yesterday = Visitor_Count::where('type','yesterday')->first();
        $month = Visitor_Count::where('type','this_month')->first();
        $last_month = Visitor_Count::where('type','last_month')->first();
        $total = Visitor_Count::where('type','total')->first();

        return view('portal',compact('pengumuman','today','yesterday','month','last_month','total'));
    }

    public function visitors()
    {
        $today = Visitor_Count::where('type','today')->first();
        $month = Visitor_Count::where('type','this_month')->first();

        if(!array_key_exists('visitor', $_COOKIE)){
            if($today->date == date('Y-m-d',strtotime(now()))){
                Visitor_Count::where('type','today')->increment('value');
            } else {
                Visitor_Count::where('type','yesterday')->update(['value'=>$today->value,'date'=>$today->date]);
                Visitor_Count::where('type','today')->update(['value'=>1,'date'=>now()]);
            }
    
            if(date('m', strtotime($month->date)) == date('m',strtotime(now()))){
                Visitor_Count::where('type','this_month')->increment('value');
            } else {
                Visitor_Count::where('type','last_month')->update(['value'=>$month->value,'date'=>$month->date]);
                Visitor_Count::where('type','this_month')->update(['value'=>1,'date'=>now()]);
            }
            
            Visitor_Count::where('type','total')->increment('value');

            setcookie('visitor', 1);
        }
    }

    public function ramuanList(Request $request)
    { 
        // $tumbuhan = Ramuan::where('ing_category',1)->where('is_lulus',1)->where('is_delete',0);
        // $haiwan = Ramuan::where('ing_category',2)->where('is_delete',0)->where('is_lulus',1);
        // $kimia = Ramuan::where('ing_category',3)->where('is_delete',0)->where('is_lulus',1);
        // $semulaJadi = Ramuan::where('ing_category',4)->where('is_delete',0)->where('is_lulus',1);
        // $other = Ramuan::where('ing_category',5)->where('is_delete',0)->where('is_lulus',1);
        $all = Ramuan::where('is_delete',0)->where('is_lulus',1)->whereBetween('ing_category', array(1,5));

        $list = Ramuan::where('is_delete',0)->where('is_lulus',1);

        if(!empty($request->cari)){ $list->where('nama_ramuan','LIKE','%'.$request->cari.'%')->orWhere('nama_saintifik','LIKE','%'.$request->cari.'%'); }

        if(!empty($request->carian)){
            if($request->carian == 'tumbuhan'){
                $list->where('ing_category',1);
            } elseif($request->carian == 'haiwan') {
                $list->where('ing_category',2);
            } elseif($request->carian == 'kimia') {
                $list->where('ing_category',3);
            } elseif($request->carian == 'semulaJadi') {
                $list->where('ing_category',4);
            } elseif($request->carian == 'other') {
                $list->where('ing_category',5);
            }
        }

        $list = $list->orderBy('nama_ramuan')->whereBetween('ing_category', array(1,5))->paginate(10);

        //Count
        $today = Visitor_Count::where('type','today')->first();
        $yesterday = Visitor_Count::where('type','yesterday')->first();
        $month = Visitor_Count::where('type','this_month')->first();
        $last_month = Visitor_Count::where('type','last_month')->first();
        $total = Visitor_Count::where('type','total')->first();
        // dd($list);

        // dd(DB::getQueryLog());
        return view('ramuan_list', compact('list', 'all', 'today', 'today', 'yesterday', 'month', 'last_month', 'total'));
    }

    public function syarikat($id)
    {
        // dd($id);
        $company = Ramuan::find($id);
        $list = Ramuan::where('create_by', $company->create_by)->get();
        return view('modalSyarikat', compact('company','list'));
    }
}
