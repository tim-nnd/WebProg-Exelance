<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $timestamps = false;
    protected $table = "activities";

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
