<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    public $timestamps = false;
    protected $table = "meetings";

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function meetingdetails(){
        return $this->hasMany(MeetingDetail::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
