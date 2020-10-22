<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_type_id', 'title', 'description', 'status'
    ];

    public function roomType(){
        return $this->belongsTo(RoomType::class,'room_type_id');
    }

    public function bookings(){
        return $this->belongsToMany(Booking::class,'booking_details','room_id','booking_id');
    }
}
