<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    protected $table = "quarters";
    protected $fillable = ['name', 'init_date', 'end_date'];

    public function poll(){
        return $this->hasMany('App\Poll');
    }
}
