<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table = "titles";
    protected $fillable = ['title'];

    public function poll() {
        return $this->hasMany('Poll');
    }
}
