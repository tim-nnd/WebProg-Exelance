<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "roles";

    public function teamrole(){
        return $this->hasOne(TeamDetail::class);
    }
}
