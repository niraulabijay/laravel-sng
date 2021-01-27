<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\destination\DestinationResource;
use App\Http\Resources\faq\FaqCategoryResource;
use App\Http\Resources\gallery\AlbumResource;
use App\Model\FaqCategory;
use App\Repositories\destination\DestinationInterface;
use App\Repositories\faq\FaqInterface;
use App\Repositories\gallery\GalleryInterface;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected  $destinations;
    protected $gallery;
    public function __construct(DestinationInterface $destinationRepository, FaqInterface $faqRepository, GalleryInterface $gallery)
    {
        $this->destination = $destinationRepository;
        $this->faq = $faqRepository;
        $this->gallery = $gallery;
    }
    public function destinations(){
        $destinations = $this->destination->destinationHasHotels();
        return [
            'status' => 'success',
            'destinations' => DestinationResource::collection($destinations)
        ];
    }

    public function faqs(){
        $faqCatQuestions = FaqCategoryResource::collection($this->faq->faqWithQues());
        return [
            'status' => 'success',
            'categories' => $faqCatQuestions,
        ];
    }

    public function gallery(){
        $albums = $this->gallery->albums();
        return [
            'status' => 'success',
            'gallery' => AlbumResource::collection($albums),
        ];
    }

}
