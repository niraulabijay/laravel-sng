<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('admin.site');
    }

    public function update(Request $request)
    {
        
        $inputs = $request->all();
        foreach ($inputs as $inputKey => $inputValue) {
            $images = [
                'logo', 'favicon', 'banner_image','banner_image_2','banner_image_3', 'discount_section_image', 'about_image',
                'mission_1_image', 'mission_2_image', 'mission_3_image','discover_image','discover_1_image',
                'discover_2_image','discover_3_image','head_person_signature','contact_image',
                'special_offer_image_1','special_offer_image_2','special_offer_image_3','deals_image','resturant_banner',
                'resturant_slider_1','resturant_slider_2','resturant_slider_3'
            ];
            if(in_array($inputKey, $images)){
                if($request->hasFile($inputKey)){
                    $inputValue = $this->updateImageMeta($inputKey, $request);
                }
            }
            SiteSetting::updateOrCreate( [ 'key' => $inputKey ], [ 'value' => $inputValue ] );
        }
        return redirect()->back()->with('success', 'Successfully Updated.');
    }



    private function updateImageMeta($inputKey, $request){
        $sitesetting = SiteSetting::where('key', '=', $inputKey)->first();
        if($sitesetting)
        {
            if(file_exists($sitesetting->value)){
                unlink($sitesetting->value);
            }
        }
        $inputValue = $this->uploadImage( $request->file($inputKey), 'upload/site/');
        return $inputValue;
    }

    public function uploadImage($file, $path){
        if ($file) {
            $uploadedfile =  time() . '.' . $file->getClientOriginalName();
            $destinationPath = public_path($path);
            $file->move($destinationPath, $uploadedfile);
            return $path.$uploadedfile;
        }
        return null;
    }

    
}
