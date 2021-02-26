<?php

namespace App\Http\Controllers\admin;

use App\Model\Hotel;
use App\Http\Controllers\Controller;
use App\Model\Room;
use App\Model\RoomType;
use App\Repositories\amenity\AmenityInterface;
use App\Repositories\hotel\HotelInterface;
use App\Repositories\roomType\RoomTypeInterface;
use App\tableList;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\MediaLibrary\Models\Media;

class RoomTypeController extends Controller
{
    protected $roomType, $hotel, $amenity;
    public function __construct(RoomTypeInterface $roomtype, HotelInterface $hotel, AmenityInterface $amenity)
    {
        $this->roomType = $roomtype;
        $this->hotel = $hotel;
        $this->amenity = $amenity;
    }
    public function index()
    {
        $hotels = $this->hotel->getActiveHotels();
        return view('admin.roomType.index',compact('hotels'));
    }
    public function add($hotelSlug){
     
        try{
            $hotel = Hotel::where('slug',$hotelSlug)->first();
            $amenities = $this->amenity->getActive();
            return view('admin.roomType.add',compact('hotel','amenities'));
        }catch(\Exception $e){
            Toastr::error($e->getMessage(),'Server Error');
            return redirect()->back();
        }
    }

    public function store(Request $request, $hotelSlug){
        
        
        $request->validate([
            'hotel_id' =>'required',
            'title' => 'required',
            'status' => 'required',
            // 'feature_image' => 'required|mimes:png,jpg,gif,webp,JPG,jpeg,JPEG,PNG',
            'feature_image'=>'required',
            'base_price' => 'required|min:0',
            'max_occupancy' => 'required|min:1',
        ]);

        try{
            $roomType = new RoomType();
            $roomType->title = $request->title;
            $roomType->hotel_id = $request->hotel_id;
            $roomType->description = $request->description;
            $roomType->max_occupancy = $request->max_occupancy;
            $roomType->no_of_adult = $request->no_of_adult;
            $roomType->no_of_child = $request->no_of_child;
            $roomType->base_price = $request->base_price;
            $roomType->status = $request->status == "on" ? "Active" : "Inactive";
            if($request->discount_amount && $request->discount_type =="offer_price")
            {
                $roomType->offer_price = $request->discount_amount;
            }
            else if($request->discount_amount && $request->discount_type == "discount_percent")
            {
                $roomType->discount_percent = $request->discount_amount;
            }
            
            if($request->tax_status)
            {
                $roomType->tax_status = 1;
            }
            $roomType->start_date =$request->start_date;
            $roomType->end_date = $request->end_date;
            if($request->additional_price)
            {
                $roomType->additional_price = 1;
            }
            if($request->inclusion)
            {
                $roomType->inclusions = json_encode($request->inclusion);
            }
            $roomType->save();
            
            // if ($request->hasFile('feature_image')) {
            //     foreach ($request->file('feature_image') as $photo) {
            //         $roomType->addMedia($photo)->toMediaCollection('feature_image');
            //     }
            // }
            // $room = RoomType::find($roomType->id);
            //  $room->addMultipleMediaFromRequest(['feature_image'])
            // ->each(function ($fileAdder) {
            //     $fileAdder->toMediaCollection();
            // });
          
        
      
                  if($request->hasFile('feature_image')){
                $roomType->addMediaFromRequest('feature_image')
                    ->toMediaCollection('feature_image');
            }
       
            if($request->amenities){
                $roomType->amenities()->attach($request->amenities);
            }
    

            Toastr::success('Room type created','Operation Success');
            return redirect()->route('admin.roomType');

        }catch(\Exception $e){
            Toastr::error($e->getMessage(),'Server Error');
            return redirect()->back();
        }
    }

    public function edit(Request $request, $slug){
        
        $editRoomType = RoomType::where('slug',$slug)->first();
   
        $hotel = $editRoomType->hotel;
        $amenities = $this->amenity->getActive();
        if(!$editRoomType){
            Toastr::error('Data not found','Operation Failed');
            return redirect()->route('admin.roomType');
        }
        return view('admin.roomType.add',compact('hotel','editRoomType','amenities'));
    }

    public function update(Request $request, $slug){
    
        $request->validate([
            'room_type' =>'required',
            'title' => 'required',
            'status' => 'required',
            'feature_image' => 'mimes:png,jpg,gif,webp,JPG,jpeg,JPEG,PNG',
            'base_price' => 'required|min:0',
            'max_occupancy' => 'required|min:1',
        ]);
        try{
            $roomType = RoomType::find($request->room_type);
       
            $roomType->title = $request->title;
            $roomType->description = $request->description;
            $roomType->max_occupancy = $request->max_occupancy;
            $roomType->no_of_adult = $request->no_of_adult;
            $roomType->no_of_child = $request->no_of_child;
            $roomType->base_price = $request->base_price;
            $roomType->status = $request->status == "on" ? "Active" : "Inactive";
            $roomType->tax_status = $request->tax_status ? 1 : 0;
            $roomType->additional_price = $request->additional_price ? 1 : 0;
            $roomType->start_date = $request->start_date ? $request->start_date : $roomType->start_date;
            $roomType->end_date = $request->end_date ? $request->end_date : $roomType->end_date;
            if($request->discount_amount && $request->discount_type =="offer_price")
            {
                $roomType->offer_price = $request->discount_amount;
                $roomType->discount_percent = 0;
            }
            else if($request->discount_amount && $request->discount_type == "discount_percent")
            {
                $roomType->discount_percent = $request->discount_amount;
                $roomType->offer_price = 0;
            }
            else
            {
                $roomType->offer_price = 0;
                $roomType->discount_percent = 0;
            }
            $roomType->inclusions = $request->inclusion ? json_encode($request->inclusion) : $roomType->inclusion;
            $roomType->update();

            $roomType->amenities()->sync($request->amenities ?? []);

            if($request->hasFile('feature_image')){
                $roomType->addMediaFromRequest('feature_image')
                    ->toMediaCollection('feature_image');
            }

            Toastr::success('Room type updated','Operation Success');
            return redirect()->route('admin.roomType');

        }catch(\Exception $e){
            Toastr::error($e->getMessage(),'Server Error');
            return redirect()->back();
        }
    }

    public function delete(Request $request){
        $roomType = RoomType::find($request->room_type_id);
        if(!$roomType){
            Toastr::error('Room Type Not Found','Cannot Delete Room Type');
            return redirect()->back();
        }
        $id_key = 'room_type_id';

        $tables = tableList::getTableList($id_key);
        try {
            if($roomType->amenities())
            {
                
                $roomType->amenities()->delete();
            }
        
            if($roomType->inclusions())
            {
                $roomType->inclusions()->delete();
            }
            if(  $roomType->rooms())
            {
             
                $roomType->rooms()->delete();
            }

            if(  $roomType->room_type_prices())
            {

                $roomType->room_type_prices()->delete();
            }
        
            $delete_query = $roomType->delete();

            
            if ($delete_query) {
                Toastr::success('Room Type has been deleted successfully', 'Operation Success');
                return redirect()->back();
            } else {
                Toastr::error('Something went wrong.', 'Failed to Delete');
                return redirect()->back();
            }

        } catch (\Illuminate\Database\QueryException $e) {
            $msg = 'This data already used in  : ' . $tables . ' Please remove those data first';
            Toastr::error($msg, 'Operation Failed');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Server Error');
            return redirect()->back();
        }
    }

    public function images($slug)
    {   
        $roomType = RoomType::where('slug',$slug)->first();
     
        return view('admin.roomType.multiple-images',compact('roomType'));

    }   

    public function get_gallery($slug)
    {
        $roomType = RoomType::where('slug',$slug)->first();
        $images = [];
        $getMedias =  $roomType->getMedia('roomtype_otherimages');
        
        foreach($getMedias as $media)
        {
            $images['url'][] = $media->getFullUrl();
            $images['id'][] = $media->id;

        }
     
        return $images;
    
    }
    
    public function upload(Request $request,$slug){
      
        
        $validator = Validator::make($request->all(), [
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',

        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()[0] ?? "Action Failed"],400);
        }
        try {
        $roomType = RoomType::where('slug',$slug)->first();
        $roomType->addMediaFromRequest('image')->toMediaCollection('roomtype_otherimages');
        return response()->json("File Added", 200);
        }catch (\Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }

    public function deleteImage($id)
    {
        $delete = Media::where('id', $id)->delete();
        if($delete){
            return response()->json("Deleted",200);
        }
        else{
            return response()->json("Error",400);
        }
    }

}
