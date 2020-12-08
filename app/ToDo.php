<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    public $timestamps = false;
    protected $table = "todos";

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
