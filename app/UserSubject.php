<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubject extends Model
{
    protected $table = "user_subject";
    protected $fillable = ['user_id', 'subject_id'];
}
