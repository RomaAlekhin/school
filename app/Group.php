<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function teacher()
    {
        return $this->hasOne('App\Teacher');
    }
}
