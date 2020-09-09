<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ramuan_Komen extends Model
{
    protected $table = 'ramuan_komen';

    protected $guarded = [];

    public $timestamps = false;

    public function ramuan()
    {
        return $this->belongsTo('App\Ramuan', 'ramuan_id');
    }
}
