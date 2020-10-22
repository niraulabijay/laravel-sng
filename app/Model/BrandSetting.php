<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class BrandSetting extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = ['brand_id', 'key', 'value','parent'];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    //Mediacollection to hold only one file
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('image')
            ->singleFile();
    }
    //return brand logo
    public function image()
    {
        return $this->getFirstMedia('image');
    }

    //Register Media conversion
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumbnail')
              ->width(300)
              ->height(300)
              ->sharpen(10);
    }

}
