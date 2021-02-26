<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class RoomType extends Model implements HasMedia
{
    use Sluggable;
    use HasMediaTrait;

    protected $fillable = ['title', 'slug', 'inclusion','status','tax_status','description', 'hotel_id', 'no_of_adult', 'no_of_child', 'offer_price','discount_percent','base_price','start_date','end_date','additional_price'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }

    public function base_price_format()
    {
        return $this->base_price;
    }


    public function hotel(){

        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');

    }

    public function amenities(){

        return $this->belongsToMany(Amenity::class, 'amenity_room_type', 'room_type_id');

    }

    public function inclusions(){

        return $this->belongsToMany(Inclusion::class, 'inclusion_room_type', 'room_type_id');

    }

    public function icon()
    {
        return $this->morphOne('App\RoomType', 'iconable');
    }

    public function rooms(){
        return $this->hasMany(Room::class,'room_type_id');
    }

    public function room_type_prices(){
        return $this->hasMany(RoomTypePrice::class,'room_type_id');
    }


    //Mediacollection to hold only one file
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('feature_image')
            ->singleFile();
    }

    //return hotel feature image
    public function featureImage()
    {
        return $this->getFirstMedia('feature_image');
    }

    public function featureMultipleImage()
    {
        return $this->getFirstMedia();
    }

    //Register Media conversion
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumbnail')
            ->width(350)
            ->height(200)
            ->sharpen(10);
    }




    // Not used
    // public function images()
    // {
    //     return $this->morphMany('App\RoomType', 'imageable')->where('is_main', 0);
    // }
}
