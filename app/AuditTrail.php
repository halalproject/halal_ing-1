<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    protected $table = "auditrail";

    protected $primaryKey = 'aid';

    protected $guarded = [];

    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo('App\Admin','userid');
    }

    public function client()
    {
        return $this->belongsTo('App\Client','userid','userid');
    }
}
