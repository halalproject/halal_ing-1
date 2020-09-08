<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = "admin";

    protected $guarded = [];

    public $timestamps = false;
    
    public function level()
    {
        return $this->belongsTo('App\Ref_User_Level', 'user_level');
    }

    public function jawatan()
    {
        return $this->belongsTo('App\Ref_User_Jawatan', 'user_jawatan');
    }
    
    public function status()
    {
        return $this->belongsTo('App\Ref_User_Status', 'user_status');
    }
}
