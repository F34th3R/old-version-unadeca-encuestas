<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    protected $fillable = ['name', 'student_id', 'identification', 'faculty', 'emphasis', 'nationality', 'religion', 'status', 'gender', 'age', 'email', 'cellnumber'];
}
