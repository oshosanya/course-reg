<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Student', 'id_user', 'id_user');
    }
}
