<?php

namespace App\Repositories\destination;

use App\Model\Destination;

class DestinationRepository implements DestinationInterface{

    public function activeDestinations(){
        return Destination::where('status','Active')->with('hotels')->get();
    }

    public function destinationHasHotels(){
        $destinations = $this->activeDestinations()->filter(function ($destination) {
            return $destination->hotels->count() > 0;
        });
        return $destinations;
    }
}
