<?php

namespace App\Http\Resources\room;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomTypeResource extends JsonResource
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
            'title' => $this->title,
            'feature_image' => $this->featureImage() ? asset($this->featureImage()->getUrl()) : null,
            'price' => $this->base_price_format()
        ];
    }
}
