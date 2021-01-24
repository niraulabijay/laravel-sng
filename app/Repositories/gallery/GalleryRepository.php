<?php
/**
 * Created by PhpStorm.
 * User: Bijay
 * Date: 1/24/2021
 * Time: 3:11 PM
 */

namespace App\Repositories\gallery;


use App\Model\Album;

class GalleryRepository implements GalleryInterface
{
    public function albums(){
        return Album::all();
    }
}