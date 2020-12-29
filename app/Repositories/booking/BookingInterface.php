<?php

namespace App\Repositories\booking;

interface BookingInterface{

    // get all active bookings
    public function all();

    // find by id implemented from eloquent repository
    public function find($id);

    // check if room is available within selected dates
    public function availableRooms($array = []);

    public function adminBooking($user, $array);

    //Filter Booking in preview
    public function getFilterData($params);

}
