<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\FrontCms\CmsInterface;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    protected $cms;
    public function __construct(CmsInterface $cms)
    {
        $this->cms = $cms;
    }
    public function packages(){
        $packages = $this->cms->getGlobalPostByPostTypeSlug('packages');
        return response()->json([
            'status' => 'success',
            'packages' => $this->formatPackage($packages)
        ],200);
    }

    private function formatPackage($packages){
        $data = [];
        foreach($packages as $package){
            $data[] = [
                'id' => $package->id,
                'slug' => $package->slug,
                'title' => $package->title,
                'image' => $package->image ? asset($package->image) : null,
                'description' => $package->post_content,
                'duration' => $this->cms->getGlobalPostMetaByKey($package, 'duaration') ?? null,
                'price' => $this->cms->getGlobalPostMetaByKey($package, 'price') ?? null,
                'offer_price' => $this->cms->getGlobalPostMetaByKey($package, 'offer-price') ?? null,
            ];
        }
        return $data;
    }

    public function singlePackage($slug){
        $postType = $this->cms->getGlobalPostTypeBySlug('packages');
        $package = $this->cms->getGlobalPostSingleBySlug($postType, $slug);
        return response()->json([
            'status' => 'success',
            'packages' => $this->formatSinglePackage($package)
        ],200);
    }

    private function formatSinglePackage($package){
        return [
            'id' => $package->id,
            'slug' => $package->slug,
            'title' => $package->title,
            'image' => $package->image,
            'description' => $package->post_content,
            'duration' => $this->cms->getGlobalPostMetaByKey($package, 'duration') ?? null,
            'price' => $this->cms->getGlobalPostMetaByKey($package, 'price') ?? null,
            'offer_price' => $this->cms->getGlobalPostMetaByKey($package, 'offer-price') ?? null,
            'language' => $this->cms->getGlobalPostMetaByKey($package, 'language') ?? null,
            'min-group-size' => $this->cms->getGlobalPostMetaByKey($package, 'min-group-size') ?? null,
            'inclusions' => $this->getSingleValueRepeaterMeta($package, 'inclusions') ?? [],
            'exclusions' => $this->getSingleValueRepeaterMeta($package, 'exclusions') ?? [],
        ];
    }

    private function getSingleValueRepeaterMeta($post, $key){
        $data = unserialize($this->cms->getGlobalPostMetaByKey($post, $key));
        $values = [];
        $data = array_values($data);
        if($data) {
            foreach ($data as $key=>$val) {
                foreach($val as $k=>$v)
                    $values[] = $v;
            }
            return $values;
        }
     return null;
    }

    public function videoGallery(){
        $videos = $this->cms->getGlobalPostByPostTypeSlug('video-gallery');
        return response()->json([
            'status' => 'success',
            'videos' => $this->formatVideo($videos)
        ],200);
    }

    private function formatVideo($videos){
        $data = [];
        foreach($videos as $video){
            $data[] = [
                'title' => $video->title,
                'description' => $video->post_content,
                'youtube-url' => $this->cms->getGlobalPostMetaByKey($video,'video-url')
            ];
        }
        return $data;
    }

    public function restaurant(){
        $restaurantCategories = $this->cms->getGlobalPostByPostTypeSlug('restaurant-category');
        foreach ($restaurantCategories as $category){
            $food_meta = $this->cms->getGlobalPostMetaByKey($category,'items');
            if($food_meta){
                $food_ids = unserialize($food_meta);
                $foods = $this->cms->getGlobalPostMultipleByIds($food_ids) ?? [];
                $foods = $this->formatFoods($foods);
                $category->foods = $foods;
            }
        }
        // dd($restaurantCategories);
        $foodCategories = $this->formatRestaurant($restaurantCategories);
        return response()->json([
            'status' => 'success',
            'foodCategories' => $foodCategories
        ],200);
    }

    private function formatFoods($foods){
        $data = [];
        foreach($foods as $food){
            $data[] = [
                'title' => $food->title,
                'description' => $food->post_content,
                'image' => $food->image ? asset($food->image) : null,
                'price' => $this->cms->getGlobalPostMetaByKey($food,'price')
            ];
        }
        return $data;
    }

    private function formatRestaurant($categories){
        $data = [];
        foreach($categories as $category){
            $data[] = [
                'title' => $category->title,
                'slug' => $category->slug,
                'description' => $category->post_content,
                'image' => $category->image ? asset($category->image) : null,
                'foods' => $category->foods ?? []
            ];
        }
        return $data;
    }

    public function teams(){
        $teams = $this->cms->getGlobalPostByPostTypeSlug('team');
        return response()->json([
            'status' => 'success',
            'teams' => $this->formatTeam($teams)
        ],200);
    }

    private function formatTeam($teams){
        $data = [];
        foreach($teams as $team){
            $data[] = [
                'title' => $team->title,
                'description' => $team->post_content,
                'image' => $team->image ? asset($team->image) : null,
                'designation' => $this->cms->getGlobalPostMetaByKey($team,'designation')
            ];
        }
        return $data;
    }
}
