<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "notifications";
}
