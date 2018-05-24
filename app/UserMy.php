<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMy extends Model
{
    protected $table = "user_my";
    protected $fillable = ['user_id', 's_register'];

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
