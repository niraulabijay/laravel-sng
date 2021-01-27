<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\room\RoomTypeResource;
use App\Model\SiteSetting;
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
        $siteSettings = SiteSetting::all();
        return response()->json([
            'status' => 'success',
            'data' => [
                'banner_text' => $this->getSiteMeta('banner_text',$siteSettings),
                'banner_image' => $this->getSiteMeta('banner_image',$siteSettings) ? asset($this->getSiteMeta('banner_image',$siteSettings)) : null,
            ],
            'welcome' => [
                'welcome_message' => $this->getSiteMeta('welcome_message',$siteSettings),
                'head_person' => $this->getSiteMeta('head_person',$siteSettings),
                'head_person_designation' => $this->getSiteMeta('head_person_designation',$siteSettings),
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
        $siteSettings = SiteSetting::all();
        return response()->json([
            'status' => 'success',
            'data' => [
                'overview' => $this->getSiteMeta('overview',$siteSettings),
                'about_image' => $this->getSiteMeta('about_image',$siteSettings) ? asset($this->getSiteMeta('about_image',$siteSettings)) : null,
                'why_choose' => $this->getSiteMeta('why_choose',$siteSettings),
                'mission' => [
                    [
                        'text' => $this->getSiteMeta('mission_1_title',$siteSettings),
                        'image' => $this->getSiteMeta('mission_1_image',$siteSettings) ? asset($this->getSiteMeta('mission_1_image',$siteSettings)) : null,
                    ],
                    [
                        'text' => $this->getSiteMeta('mission_2_title',$siteSettings),
                        'image' => $this->getSiteMeta('mission_2_image',$siteSettings) ? asset($this->getSiteMeta('mission_2_image',$siteSettings)) : null,
                    ],
                    [
                        'text' => $this->getSiteMeta('mission_3_title',$siteSettings),
                        'image' => $this->getSiteMeta('mission_3_image',$siteSettings) ? asset($this->getSiteMeta('mission_3_image',$siteSettings)) : null,
                    ]
                ]
            ],
        ],200);
    }

    public function getSiteMeta($key, $settings){
        $data = $settings->where('key',$key)->first();
        if($data){
            return $data->value;
        }
        return null;
    }
}
