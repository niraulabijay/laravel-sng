<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PopImageResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return $this->collection->map(function($item){
            return[
                'id'=>$item->id,
                'image'=>asset($item->image),
                'status'=>$item->status
            ];
        });
    }


}
