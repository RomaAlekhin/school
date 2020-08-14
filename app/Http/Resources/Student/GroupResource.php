<?php

namespace App\Http\Resources\Student;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $teacher = $this->teacher;
        $user = $teacher->user;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'teacher' => [
                'name' => $user->name,
                'specialty' => $teacher->specialty
            ],
            'schedules' => $this->schedules
        ];
    }
}
