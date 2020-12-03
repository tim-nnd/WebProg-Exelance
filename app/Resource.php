<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "resources";
}
