<?php

namespace App\Http\Resources\room;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomEminities extends JsonResource
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
            'title' => $this->title,
            'description'=>$this->description,
            'icon'=>$this->icon()
            
        ];
    }
}
