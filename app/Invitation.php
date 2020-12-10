<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    public $timestamps = false;
    protected $table = "invitations";

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function team(){
        return $this->belongsTo(Team::class,'team_id');
    }
}
