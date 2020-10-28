<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Brand extends Model implements HasMedia
{
    use HasMediaTrait;
    use Sluggable;
    protected $fillable = ['title', 'slug', 'status', 'description'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }



    public function brandSettings(){

        return $this->hasMany(BrandSetting::class, 'brand_id', 'id');

    }

    public function hotels(){

        return $this->hasMany(Hotel::class, 'brand_id', 'id');

    }

    public function icon()
    {
        return $this->morphOne('App\Brand', 'iconable');
    }

    //Mediacollection to hold only one file
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('brand_logo')
            ->singleFile();
    }

    //return brand logo
    public function logo()
    {
        return $this->getFirstMedia('brand_logo');
    }

    //Register Media conversion
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('logo-thumb')
              ->width(350)
              ->height(200)
              ->sharpen(10);
    }


    // Brand front page services
    public function services(){
        $services = $this->brandSettings->where('key','service_title');
        foreach($services as $s)
            $s->description = $this->brandSettings->where('key','service_description')->where('parent',$s->id)->first()->value;
        return $services;
    }

    //Brand front page experience
    public function experience(){
        $experience = $this->brandSettings->where('key','experience')->first();
        if($experience){
            $experience->image = $experience->hasMedia('image') ? $experience->image() : null;
        }
        return $experience;
    }
    //Brand front page banner
    public function settingMeta($metaKey){
        $meta = $this->brandSettings->where('key',$metaKey)->first();
        if($meta){
            $meta->image = $meta->hasMedia('image') ? $meta->image() : null;
        }
        return $meta;
    }

}
