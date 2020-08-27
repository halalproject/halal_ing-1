<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class Client extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = "client_halal_ingredient";

    protected $guarded = [];

    public $timestamps = false;
}
