<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calendar_event extends Model
{
    protected $table = "calendar_event";

    protected $guarded = [];

    public $timestamps = false;
}
