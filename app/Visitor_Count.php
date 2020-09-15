<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor_Count extends Model
{
    protected $table = 'visitor_count';
    
    protected $guarded = [];

    public $timestamps = false;
}
