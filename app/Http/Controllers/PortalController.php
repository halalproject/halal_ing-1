<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ramuan;
use App\calendar_event;

class PortalController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->ip());
        $this->visitors();

        $pengumuman = calendar_event::where('kategori',1)->where('is_public',1)->whereRaw('"'.date('Y-m-d').'"  between `start_date` and `end_date`')->get();

        $today = 0;
        $yesterday = 0;
        $month = 0;
        $last_month = 0;
        $total = 0;

        return view('portal',compact('pengumuman','today','yesterday','month','last_month','total'));
    }

    public function visitors()
    {
        
    }

    public function ramuanList(Request $request)
    { 
        $tumbuhan = Ramuan::where('ing_category',1)->where('is_lulus',1)->where('is_delete',0);
        $haiwan = Ramuan::where('ing_category',2)->where('is_delete',0)->where('is_lulus',1);
        $kimia = Ramuan::where('ing_category',3)->where('is_delete',0)->where('is_lulus',1);
        $semulaJadi = Ramuan::where('ing_category',4)->where('is_delete',0)->where('is_lulus',1);
        $other = Ramuan::where('ing_category',5)->where('is_delete',0)->where('is_lulus',1);
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

        // dd(DB::getQueryLog());
        return view('ramuan_list', compact('tumbuhan','haiwan','kimia','semulaJadi','other','all','list'));
    }

    public function syarikat($id)
    {
        // dd($id);
        $company = Ramuan::find($id);
        $list = Ramuan::where('create_by', $company->create_by)->get();
        return view('modalSyarikat', compact('company','list'));
    }
}
