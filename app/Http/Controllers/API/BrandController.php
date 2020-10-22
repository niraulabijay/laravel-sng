<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\brand\BrandResource;
use App\Repositories\brand\BrandInterface;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct(BrandInterface $brandRepository)
    {
        $this->brandRepo = $brandRepository;
    }
    public function getBrands(){
        $brands = $this->brandRepo->activeBrands();
        return response()->json([
            'status' => 'success',
            'brands' => BrandResource::collection($brands)
        ],200);
    }

    public function getFrontData($slug){
        $brand = $this->brandRepo->findBySlug($slug);
        $services = $this->formatService($brand->services());
        $experience = $this->formatExperience($brand->experience());
        return response()->json([
            'status' => 'success',
            'brand' => new BrandResource($brand),
            'experience' => $experience,
            'services' => $services,
        ]);
    }

    private function formatService($services){
        $new_services = [];
        foreach($services as $service){
            $new_services[] = [
                'title' => $service->value,
                'description' => $service->description,
                'image' => asset($service->image()->getUrl()) ?? null,
            ];
        }
        return $new_services;
    }

    private function formatExperience($experience){
        return [
            'message' => $experience->value,
            'image' => $experience->image ? asset($experience->image->getUrl()) : null,
        ];
    }
}
