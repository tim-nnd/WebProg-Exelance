<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "todos";
}
