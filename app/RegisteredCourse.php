<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisteredCourse extends Model
{
    public function result()
    {
        return $this->hasOne('App\Result', 'id_registered_course');
    }
}
