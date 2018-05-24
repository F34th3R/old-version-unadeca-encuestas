<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Poll_Question extends Pivot
{
    protected $table = "poll_question";
    protected $fillable = ['poll_id', 'question_id'];

    public function polls(){
        return $this->belongsToMany('App\Poll');
    }
    public function questions(){
        return $this->belongsTo('App\Question');
    }
}
