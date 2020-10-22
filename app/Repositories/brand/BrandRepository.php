<?php

namespace App\Repositories\brand;

use App\Model\Brand;

class BrandRepository implements BrandInterface{

    public function activeBrands(){
        return Brand::where('status','Active')->get();
    }

    public function findBySlug($slug){
        return Brand::where('slug',$slug)->first();
    }
}
