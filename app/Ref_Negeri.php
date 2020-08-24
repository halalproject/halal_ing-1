<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ref_Negeri extends Model
{
    protected $table = 'ref_negeri';

    protected $primaryKey = 'kod';

    protected $keyType = 'string';

    protected $guarded = [];

    public $timestamps = false;
}
