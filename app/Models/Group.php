<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
        // return $this->hasOne('App\Models\Teacher');
    }

    public function students()
    {
        return $this->belongsToMany('App\Models\Student');
    }

    public function schedules()
    {
        return $this->hasMany('App\Models\GroupSchedule');
    }

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }
}
