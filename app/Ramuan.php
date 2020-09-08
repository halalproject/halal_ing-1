<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ramuan extends Model
{
    protected $table = 'ramuan';

    protected $guarded = [];

    public $timestamps = false;

    public function sumber()
    {
        return $this->belongsTo('App\Ref_Sumber_Bahan','sumber_bahan_id');
    }

    public function negara()
    {
        return $this->belongsTo('App\Ref_Negara','negara_pengilang_id');
    }

    public function negeri()
    {
        return $this->belongsTo('App\Ref_Negeri','negeri_pembekal_id');
    }

    public function syarikat()
    {
        return $this->belongsTo('App\Client','create_by','userid');
    }
}
