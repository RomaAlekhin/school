<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['age', 'parent_name'];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group');
    }

    public function getLessonsAttribute()
    {
        $groups = $this->groups;

        $lessons = collect();
        if (!empty($groups)) {
            foreach ($groups as $group) {
                $lessons = $lessons->merge($group->lessons);
            }
        };
        return $lessons->sortBy('date')->slice(-2);
    }
}
