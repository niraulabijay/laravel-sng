<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PackageSubmission extends Model
{
    protected $table="package_submissions";
    protected $fillable = [
        'package_id', 'name', 'email', 'phone', 'tour_date', 'no_of_persons', 'message'
    ];

    public function package(){
        return $this->belongsTo(GobalPost::class,'package_id');
    }
}
