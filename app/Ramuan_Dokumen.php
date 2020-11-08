<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ramuan_Dokumen extends Model
{
    protected $table = 'ramuan_dokumen';

    protected $guarded = [];

    public $timestamps = false;

    public function ramuan()
    {
        return $this->belongsTo('App\Ramuan', 'ramuan_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Ref_Dokumen','ref_dokumen_id');
    }
}
