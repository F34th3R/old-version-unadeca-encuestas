<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollQuestion_Vote extends Model
{
    protected $table = "poll_question_vote";
    protected $fillable = ['poll_id', 'poll_question_id', 'votes'];
}
