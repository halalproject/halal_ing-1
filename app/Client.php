<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class Client extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = "syarikat";

    protected $guarded = [];

    public $timestamps = false;

    public function negeri()
    {
        return $this->belongsTo('App\Ref_Negeri','company_state');
    }

    public function comp_ann()
    {
        return $this->belongsTo('App\Ramuan_Dokumen','userid','company_id');
    }
}
