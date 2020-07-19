<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function teacher()
    {
        return $this->hasOne('App\Teacher');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }

    public function schedules()
    {
        return $this->hasMany('App\GroupSchedule');
    }

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }
}
