<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['booking_id','payment_method','invoice_no','payment_status'];


    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
