<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'group_id' => $this->group_id,
            'date' => $this->date,
            'homework' => $this->homework,
            'status_id' => $this->pivot->status_id,
            'mark_behaviour' => $this->pivot->mark_behaviour,
            'mark_activity' => $this->pivot->mark_activity,
            'mark_homework' => $this->pivot->mark_homework,
            'mark_knowledge' => $this->pivot->mark_knowledge,
        ];
    }
}
