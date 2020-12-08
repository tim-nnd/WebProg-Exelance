<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = false;
    protected $table = "teams";

    public function teamdetails()
    {
        return $this->hasMany(TeamDetail::class);
    }

    public function todos(){
        return $this->hasMany(TeamToDo::class);
    }

    public function meetings(){
        return $this->hasMany(Meeting::class);
    }

    public function teamupdates(){
        return $this->hasMany(TeamUpdate::class);
    }
}
