<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamDetail extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "teamdetails";
    protected $primaryKey = 'team_id';

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }
}
