<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['specialty'];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->morphOne('App\User', 'typeable');
    }

    public function groups()
    {
        return $this->hasMany('App\Models\Group');
    }

    public function lesson()
    {
        return $this->hasOneThrough('App\Models\Lesson', 'App\Models\Group');
    }
}
