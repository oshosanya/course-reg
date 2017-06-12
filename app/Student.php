<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function results()
    {
        return $this->hasMany('App\Result', 'id_user', 'id_user');
    }
}
