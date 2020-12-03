<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "meetings";
}
