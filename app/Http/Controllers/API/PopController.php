<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PopImageResource;
use App\Model\PopImage;
use Illuminate\Http\Request;

class PopController extends Controller
{
    //
    public function index()
    {
      return new PopImageResource(PopImage::where('status',1)->get());
    }


}
