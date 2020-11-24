<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    protected $table = "auditrail";

    protected $primaryKey = 'aid';

    protected $guarded = [];

    public $timestamps = false;
}
