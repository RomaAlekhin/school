<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public $timestamps = false;

    public function teacher()
    {
        return $this->hasOneThrough('App\Models\Teacher', 'App\Models\Group');
    }

    public function group()
    {
        return $this->hasOne('App\Models\Group');
    }

    public function students()
    {
        return $this->belongsToMany('App\Models\Student');
    }
}
