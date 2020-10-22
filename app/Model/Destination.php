<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'id', 'destination', 'status'
    ];

    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
}
