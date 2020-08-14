<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupSchedule extends Model
{
    public $timestamps = false;

    public function group()
    {
        return $this->hasOne('App\Models\Group');
    }
}
