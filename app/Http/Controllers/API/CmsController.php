<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BasicInfoResource;
use App\Http\Resources\room\RoomTypeResource;
use App\Model\Image;
use App\Model\RoomType;
use App\Model\SiteSetting;
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

    public function singleBlog($slug)
    {
        $postType = $this->cms->getGlobalPostTypeBySlug('blog');

        $blog = $this->cms->getGlobalPostSingleBySlug($postType, $slug);

        return response()->json([
            'status' => 'success',
            'blogs' => $this->formatSingleBlog($blog)
        ],200);
    }

    public function recentBlogs()
    {
        $blogs = $this->cms->getGlobalPostByPostTypeSlug('blog');
      
        return response()->json([
            'status' => 'success',
            'recent_blogs' => $this->formatrecentBlogs($blogs->sortByDesc('created_at'))
        ],200);
    }

    private function formatrecentBlogs($blogs)
    {
        $data = [];
        foreach($blogs as $blog)
        {
            $data[] =
            [
                'id' => $blog->id,
                'slug'=>$blog->slug,
                'title' => $blog->title,
                'image'=>$blog->image ? asset($blog->image) : null,
                'date'=>date('Y-m-d',strtotime($blog->created_at)),
            ];
        }
        return $data;
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
            'min_group_size' => $this->cms->getGlobalPostMetaByKey($package, 'min-group-size') ?? null,
            'inclusions' => $this->getSingleValueRepeaterMeta($package, 'inclusions') ?? [],
            'exclusions' => $this->getSingleValueRepeaterMeta($package, 'exclusions') ?? [],
            'note' => $this->cms->getGlobalPostMetaByKey($package, 'note') ?? null,
         
        ];
    }

    private function formatSingleBlog($blog)
    {
        return
        [
            'id' => $blog->id,
            'slug'=>$blog->slug,
            'title'=>$blog->title,
            'description'=>$blog->post_content,
            'author' => $this->cms->getGlobalPostMetaByKey($blog,'author') ?? null,
            'image'=>$blog->image ? asset($blog->image) : null,
            'date'=>date('Y-m-d',strtotime($blog->created_at))
        ];
    }
    private function getSingleValueRepeaterMeta($post, $key){
        $data = unserialize($this->cms->getGlobalPostMetaByKey($post, $key));
        $values = [];
        $data = $data && count($data) > 0 ? array_values($data) : [];
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
                'youtube_url' => $this->cms->getGlobalPostMetaByKey($video,'video-url')
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
        $resturant_title = SiteSetting::where('key','resturant_title')->first();
        $resturant_slider_1 = SiteSetting::where('key','resturant_slider_1')->first();
        $resturant_slider_2 = SiteSetting::where('key','resturant_slider_2')->first();
        $resturant_slider_3 = SiteSetting::where('key','resturant_slider_3')->first();

        return response()->json([
            'status' => 'success',
            'title' => $resturant_title->value,
            'foodCategories' => $foodCategories,
            'sliders'=>[
                'slider_1' => $resturant_slider_1->value ? asset($resturant_slider_1->value)  : null,
                'slider_2' => $resturant_slider_2->value ? asset($resturant_slider_2->value) : null,
                'slider_3' => $resturant_slider_3->value ? asset($resturant_slider_3->value) : null,
            ]
        ],200);
    }

    private function formatFoods($foods){
        $data = [];
        foreach($foods as $food){
            $data[] = [
                'title' => $food->title,
                'description' => $food->post_content,
                'image' => $food->image ? asset($food->image) : null,
                'price' => $this->cms->getGlobalPostMetaByKey($food,'price'),
                'offer_price' => $this->cms->getGlobalPostMetaByKey($food,'offer-price'),

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

    public function blogs()
    {
        $blogs = $this->cms->getGlobalPostByPostTypeSlug('blog');
        return response()->json([
            'status' => 'success',
            'blogs' => $this->formatBlog($blogs)
        ],200);

    }
    private function formatTeam($teams){
        $data = [];
        $ourTeam = SiteSetting::where('key','team_description')->first();
        $data['heading'] = [
            'team_description' => $ourTeam->value
        ];
        foreach($teams as $team)
        {
        
            $data['teams'][] = [
                
                'title' => $team->title,
                'description' => $team->post_content,
                'image' => $team->image ? asset($team->image) : null,
                'designation' => $this->cms->getGlobalPostMetaByKey($team,'designation')
            ];
        }
        return $data;
    }

    private function formatBlog($blogs){
        $data = [];
        foreach($blogs as $blog)
        {
            $data[] =
            [
                'title' => $blog->title,
                'description' => $blog->post_content,
                'image' => $blog->image ? asset($blog->image) : null,
                'slug'=>$blog->slug,
                'date'=>date('Y-m-d',strtotime($blog->created_at)),
                'author' => $this->cms->getGlobalPostMetaByKey($blog,'author') ?? null,
    
            ];
        }
        return $data;
    }

    public function singleRoomType($id)
    {
        return (new RoomTypeResource(RoomType::find($id)));
    }



}
