<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamToDo extends Model
{
    public $timestamps = false;
    protected $table = "teamtodos";

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
