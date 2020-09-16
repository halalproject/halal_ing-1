<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar_Event extends Model
{
    protected $table = "calendar_event";

    protected $guarded = [];

    public $timestamps = false;

    public function syarikat()
    {
        return $this->belongsTo('App\Client','create_by','userid');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Ref_Kategori_Event','kategori');
    }
}
