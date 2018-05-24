<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_Title extends Model
{
    protected $table = "questions_titles";
    protected $fillable = ['titles_id', 'questions_id'];
}
