<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    protected $table = "sys_log";

    protected $primaryKey = 'aid';

    protected $guarded = [];

    public $timestamps = false;
}
