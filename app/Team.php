<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "teams";
}
