<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps = false;
    protected $table = 'users';

    public function activities(){
        return $this->hasMany(Activity::class);
    }

    public function todos(){
        return $this->hasMany(ToDo::class);
    }

    public function teamdetails(){
        return $this->hasMany(TeamDetail::class);
    }

    public function teamupdates(){
        return $this->hasMany(TeamUpdate::class);
    }

    public function notifications(){
        return $this->hasMany(Notification::class);
    }

    public function invitations(){
        return $this->hasMany(Invitation::class);
    }

}
