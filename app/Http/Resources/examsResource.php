<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class examsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            "id" =>  $this->id,
            "skill_id" =>  $this->skill_id,
            "name" =>  $this->name,
            "img" =>  asset($this->img),
            "desc" =>  $this->desc ,
            "questions_no" => $this->questions_no,
            "difficulty" => $this->difficulty,
            "duration_mins" => $this->duration_mins,
            "active" => $this->active,
            "questions" => questionsResource::collection($this->whenloaded("questions"))
            // "questions" => $this->questions
        ];
    }
}
