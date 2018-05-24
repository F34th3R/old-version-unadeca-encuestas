<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";
    protected $fillable = ['code', 'name'];

    public function faculties()
    {
//        return $this->belongsToMany('App\Faculty', 'faculty_subject', 'id', 'id');
        return $this->belongsToMany('App\Faculty')->withTimestamps();;
    }

    public function users()
    {
//        return $this->belongsToMany('App\User', 'user_subject', 'id', 'id')->withTimestamps();
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function polls()
    {
        return $this->belongsToMany('App\Poll')->withTimestamps();
    }
}
