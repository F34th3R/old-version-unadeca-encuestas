<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'email', 'faculties_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function faculties() {
        return $this->belongsTo('App\Faculty');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\UserMy');
    }

    public  function polls()
    {
        return $this->belongsToMany('App\Poll')->withTimestamps();
    }

    public function facultiess()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
