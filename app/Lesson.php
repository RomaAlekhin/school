<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function teacher()
    {
        return $this->hasOneThrough('App\Teacher', 'App\Group');
    }

    public function group()
    {
        return $this->hasOne('App\Group');
    }
}
