<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\room\RoomTypeResource;
use App\Repositories\FrontCms\CmsInterface;
use App\Repositories\roomType\RoomTypeInterface;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $cms, $roomType;
    public function __construct(CmsInterface $cms, RoomTypeInterface $roomType)
    {
        $this->cms = $cms;
        $this->roomType = $roomType;
    }

    public function homepage(){
        $testimonials = $this->cms->getGlobalPostByPostTypeSlug('testimonials');
        $rooms = $this->roomType->getAllActiveRoomTypes();
        return response()->json([
            'status' => 'success',
            'data' => [
                'banner_text' => getSiteSetting('banner_text'),
                'banner_image' => getSiteSetting('banner_image') ? asset(getSiteSetting('banner_image')) : null,
            ],
            'welcome' => [
                'welcome_message' => getSiteSetting('welcome_message'),
                'head_person' => getSiteSetting('head_person'),
                'head_person_designation' => getSiteSetting('head_person_designation'),
            ],
            'testimonials' => $this->formatTestimonials($testimonials),
            'rooms' => RoomTypeResource::collection($rooms)
        ],200);
    }

    private function formatTestimonials($testimonials){
        $data = [];
        foreach($testimonials as $testimonial){
            $data[] = [
                'id' => $testimonial->id,
                'title' => $testimonial->title,
                'image' => $testimonial->image ? asset($testimonial->image) : null,
                'designation' => $this->cms->getGlobalPostMetaByKey($testimonial, 'designation') ?? null,
                'company' => $this->cms->getGlobalPostMetaByKey($testimonial, 'company') ?? null,
                'description' => $testimonial->post_content,
            ];
        }
        return $data;
    }

    public function aboutPage(){
        return response()->json([
            'status' => 'success',
            'data' => [
            ]
        ],200);
    }
}
