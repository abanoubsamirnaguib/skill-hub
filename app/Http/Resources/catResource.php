<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class catResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public static $wrap = 'cats';
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            "skills" => SkillsResource::collection($this->whenLoaded('skills') ) , 
            // "skills" => $this->whenLoaded('skills') 
            // "skills" => $this->skills()->select("id","name")->get()
            
        ];
    }
    
}
