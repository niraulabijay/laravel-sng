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

    public function ourTeam()
    {
        $ourTeam = SiteSetting::where('key','team_description')->first();
        return response()->json([
            'status' => 'success',
            'team_description'=>$ourTeam->value
        ]);
    }
    public function homepage(){
        $testimonials = $this->cms->getGlobalPostByPostTypeSlug('testimonials');
        $rooms = $this->roomType->getAllActiveRoomTypes();
        $siteSettings = SiteSetting::all();
        return response()->json([
            'status' => 'success',
            'banner' => [
                'banner_text_1' => $this->getSiteMeta('banner_text',$siteSettings),
                'banner_image_1' => $this->getSiteMeta('banner_image',$siteSettings) ? asset($this->getSiteMeta('banner_image',$siteSettings)) : null,
                'banner_text_2' => $this->getSiteMeta('banner_text_2',$siteSettings),
                'banner_image_2' => $this->getSiteMeta('banner_image_2',$siteSettings) ? asset($this->getSiteMeta('banner_image_2',$siteSettings)) : null,
                'banner_text_3' => $this->getSiteMeta('banner_text_3',$siteSettings),
                'banner_image_3' => $this->getSiteMeta('banner_image_3',$siteSettings) ? asset($this->getSiteMeta('banner_image_3',$siteSettings)) : null,
            ],
            'welcome' => [
                'welcome_message' => $this->getSiteMeta('welcome_message',$siteSettings),
                'head_person' => $this->getSiteMeta('head_person',$siteSettings),
                'head_person_signature'=>$this->getSiteMeta('head_person_signature',$siteSettings) ? asset($this->getSiteMeta('head_person_signature',$siteSettings)) : null,
                'head_person_designation' => $this->getSiteMeta('head_person_designation',$siteSettings),
            ],
            'discover'=>[
                'title' =>  $this->getSiteMeta('discover_title',$siteSettings),
                'discover_image'=>$this->getSiteMeta('discover_image',$siteSettings) ? asset($this->getSiteMeta('discover_image',$siteSettings)) : null,
                'discover_description' => $this->getSiteMeta('discover-description',$siteSettings),
                'discover_1_title'=>$this->getSiteMeta('discover_1_title',$siteSettings),
                'discover_1_description'=>$this->getSiteMeta('discover_1_description',$siteSettings),
                'discover_1_image'=>$this->getSiteMeta('discover_1_image',$siteSettings) ? asset($this->getSiteMeta('discover_1_image',$siteSettings)) : null,
                'discover_2_title'=>$this->getSiteMeta('discover_2_title',$siteSettings),
                'discover_2_image'=>$this->getSiteMeta('discover_2_image',$siteSettings) ? asset($this->getSiteMeta('discover_2_image',$siteSettings)) : null,
                'discover_2_description'=>$this->getSiteMeta('discover_1_description',$siteSettings),
                'discover_3_title'=>$this->getSiteMeta('discover_3_title',$siteSettings),
                'discover_3_image'=>$this->getSiteMeta('discover_3_image',$siteSettings) ? asset($this->getSiteMeta('discover_3_image',$siteSettings)) : null,
                'discover_3_description'=>$this->getSiteMeta('discover_3_description',$siteSettings)
            ],
            'special_offer'=>[
                'title'=>$this->getSiteMeta('special_offer_title',$siteSettings),
                'description'=>$this->getSiteMeta('special_offer_description',$siteSettings),
                'title_1'=>$this->getSiteMeta('special_offer_title_1',$siteSettings),
                'image_1'=>$this->getSiteMeta('special_offer_image_1',$siteSettings) ? asset($this->getSiteMeta('special_offer_image_1',$siteSettings)) : null,
                'title_2'=>$this->getSiteMeta('special_offer_title_2',$siteSettings),
                'image_2'=>$this->getSiteMeta('special_offer_image_2',$siteSettings) ? asset($this->getSiteMeta('special_offer_image_2',$siteSettings)) : null,
                'title_3'=>$this->getSiteMeta('special_offer_title_3',$siteSettings),
                'image_3'=>$this->getSiteMeta('special_offer_image_3',$siteSettings) ? asset($this->getSiteMeta('special_offer_image_3',$siteSettings)) : null,
            ],
         
            'testimonials' => $this->formatTestimonials($testimonials),
            'deals_section'=>[
                'title'=>'A Simply Perfect Place To Get Lost. Up to 50% Discount!',
                'image'=>$this->getSiteMeta('deals_image',$siteSettings) ? asset($this->getSiteMeta('deals_image',$siteSettings)) : null,
                'description' => $this->getSiteMeta('deals_description',$siteSettings)
            ],
            'room_text' =>$this->getSiteMeta('room_text',$siteSettings) ,
            'rooms' => RoomTypeResource::collection($rooms)->take(3)
   
        ],200);
    }

    public function contactPage()
    {
        $siteSettings = SiteSetting::all();
        return response()->json([
            'status' => 'success',
            'contact'=>[
                'title' =>  $this->getSiteMeta('contact_title',$siteSettings),
                'image' =>  $this->getSiteMeta('contact_image',$siteSettings) ? asset($this->getSiteMeta('contact_image',$siteSettings)) : null,
                'description' => $this->getSiteMeta('contact_description',$siteSettings),
                'primary_phone' =>  $this->getSiteMeta('primary_phone',$siteSettings),
                'secondary_phone' =>    $this->getSiteMeta('secondary_phone',$siteSettings),
                'address' =>  $this->getSiteMeta('address',$siteSettings),
                'primary_email' => $this->getSiteMeta('primary_email',$siteSettings),
                'secondary_email' => $this->getSiteMeta('secondary_email',$siteSettings),
                'map_location' =>  $this->getSiteMeta('map_location',$siteSettings),
                'registration_number' =>  $this->getSiteMeta('registration-number',$siteSettings),
              
            ],
            'howtoreach'=>[
                'description'=>$this->getSiteMeta('how_to_reach',$siteSettings),
            ],
            'social_setting'=>[
                'facebook_url' => $this->getSiteMeta('facebook-url',$siteSettings),
                'twitter_url' => $this->getSiteMeta('twitter-url',$siteSettings),
                'linkedin_url' => $this->getSiteMeta('linkedin-url',$siteSettings),
                'youtube_url' =>  $this->getSiteMeta('youtubr-url',$siteSettings),
                'instagram_url' =>  $this->getSiteMeta('instagram-url',$siteSettings),

            ]

        ]);
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

    public function aboutPage()
    {
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

    public function basicInfo()
    {
        $siteSettings = SiteSetting::all();
        return response()->json([
            'status' => 'success',
            'data' => [
                'title' => $this->getSiteMeta('site_title',$siteSettings),
                'logo' => $this->getSiteMeta('logo',$siteSettings) ? asset($this->getSiteMeta('logo',$siteSettings)) : null,
                'primary_phone' =>  $this->getSiteMeta('primary_phone',$siteSettings),
                'secondary_phone' =>   $this->getSiteMeta('secondary_phone',$siteSettings),
                'address' =>  $this->getSiteMeta('address',$siteSettings),
                'primary_email' => $this->getSiteMeta('primary_email',$siteSettings),
                'secondary_email' => $this->getSiteMeta('secondary_email',$siteSettings),
                'map_location' =>  $this->getSiteMeta('map_location',$siteSettings),
                'registration_number' =>  $this->getSiteMeta('registration-number',$siteSettings),
                     'social_setting'=>[
                'facebook_url' => $this->getSiteMeta('facebook-url',$siteSettings),
                'twitter_url' => $this->getSiteMeta('twitter-url',$siteSettings),
                'linkedin_url' => $this->getSiteMeta('linkedin-url',$siteSettings),
                'youtube_url' =>  $this->getSiteMeta('youtubr-url',$siteSettings),
                'instagram_url' =>  $this->getSiteMeta('instagram-url',$siteSettings),

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
