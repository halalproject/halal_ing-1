<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ref_Negara extends Model
{
    protected $table = "ref_negara";

    protected $primaryKey = 'kod';

    protected $keyType = 'string';

    protected $guarded = [];

    public $timestamps = false;
}
