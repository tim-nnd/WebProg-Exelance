<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $timestamps = false;
    protected $table = "notifications";

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
