<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SkillsResource extends JsonResource
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
            "id"=> $this->id,
            "cat_id"=> $this->cat_id,
            "name"=> $this->name,
            "desc"=> $this->desc,
            "img"=> asset($this->img),
            "active"=> $this->active,
            "exams" =>  $this->WhenLoaded ("exams")
        ];
    }
}
