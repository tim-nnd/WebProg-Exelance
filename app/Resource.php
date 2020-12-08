<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    public $timestamps = false;
    protected $table = "resources";


    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

}
