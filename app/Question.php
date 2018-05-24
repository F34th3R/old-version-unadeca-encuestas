<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $fillable = ['questions'];

    public function polls()
    {
        return $this->belongsToMany('App\Poll')->withTimestamps();
    }
}
