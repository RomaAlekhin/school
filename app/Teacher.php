<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['specialty'];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function groups()
    {
        return $this->hasMany('App\Group');
    }

    public function lesson()
    {
        return $this->hasOneThrough('App\Lesson', 'App\Group');
    }
}
