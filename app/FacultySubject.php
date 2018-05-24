<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultySubject extends Model
{
    protected $table = "faculty_subject";
    protected $fillable = ['faculty_id', 'subject_id'];
}
