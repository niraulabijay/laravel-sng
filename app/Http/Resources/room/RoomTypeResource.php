<?php

namespace App\Http\Resources\room;

use Illuminate\Http\Resources\Json\JsonResource;

use function GuzzleHttp\json_decode;

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
            'price' => $this->base_price_format(),
            'description'=>$this->description,
            'no_child' => $this->no_of_child,
            'no_adult'=>$this->no_of_adult,
            'max_occupancy' =>$this->max_occupancy,
            'no_of_rooms'=>$this->rooms()->count(),
            'amenities' =>  RoomEminities::collection($this->amenities()->get()),
            'other_image' => $this->formatImages($this->getMedia('roomtype_otherimages')) ?? null,
            'tax' => $this->tax_status ? (int) getSiteSetting('tax_value') : 0,
            'offer_price' => $this->offer_price ? (int) $this->offer_price : 0,
            'discount_percentage' => $this->discount_percentage ? (int) $this->discount_percentage : 0,
            'additional_charge' => $this->additional_price ? (int) getSiteSetting('additional_charge ') : 0,
            'start_date' => $this->start_date,
            'end_date'=>$this->end_date,
            'inclusions'=>$this->inclusions ? $this->formatInclusion(json_decode($this->inclusions)) : null
        ];
    }

    public function formatImages($images)
    {
        $data=[];
        foreach($images as $image)
        {
            $data[] = $image->getFullUrl();
        }
        return $data;
    }

    public function formatInclusion($inclusions)
    {
        $data=[];
        foreach($inclusions as $inclusion)
        {
            $data[] = $inclusion;
        }
        return $data;
    }
}
