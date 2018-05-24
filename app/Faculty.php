<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = "faculties";
    protected $fillable = ['name'];

    public function subjects()
    {
//        return $this->belongsToMany('App\Subject', 'faculty_subject', 'id', 'id');
        return $this->belongsToMany('App\Subject');
    }

    public function user(){
        return $this->hasMany('App\User');
    }

    public function polls()
    {
        return $this->belongsToMany('App\Poll')->withTimestamps();
    }
}
