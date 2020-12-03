<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamToDo extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "teamtodos";
}
