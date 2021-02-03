<?php

namespace App\Repositories\booking;

interface BookingInterface{

    // get all active bookings
    public function all();

    // find by id implemented from eloquent repository
    public function find($id);

    // check if room is available within selected dates
    public function availableRooms($array = []);

    // Admin Booking form submit
    public function adminBooking($user, $array);
    // Update total price of booking at the instant of booking
    public function updatePrice($booking);

    //Filter Booking in preview
    public function getFilterData($params);

    public function store($data);

    public function availableRoomsType($data,$array);

    public function updateBooking($booking,$request);

    public function apiBooking($user,$array);

}
