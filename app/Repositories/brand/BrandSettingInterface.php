<?php

namespace App\Repositories\brand;


interface BrandSettingInterface{

    public function updateService($brand_id, $request);

    public function brandServices($brand_id);

    public function updateExperience($brand_id, $request);

    public function updateBanner($brand_id, $request);
}
