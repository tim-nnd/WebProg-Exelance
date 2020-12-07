<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingDetail extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "meetingdetails";

    public function meeting()
    {
        return $this->belongsTo(Meeting::class, 'meeting_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
