<?php

namespace App\Repositories\brand;

interface BrandInterface{

    public function activeBrands();

    public function findBySlug($slug);
}
