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
}
