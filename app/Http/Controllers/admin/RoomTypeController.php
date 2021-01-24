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
use Illuminate\Support\Facades\Validator;

class RoomTypeController extends Controller
{
    protected $roomType, $hotel, $amenity;
    public function __construct(RoomTypeInterface $roomtype, HotelInterface $hotel, AmenityInterface $amenity)
    {
        $this->roomType = $roomtype;
        $this->hotel = $hotel;
        $this->amenity = $amenity;
    }
    public function index(){
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
        // dd($request);
        $request->validate([
            'hotel_id' =>'required',
            'title' => 'required',
            'status' => 'required',
            'feature_image' => 'required|mimes:png,jpg,gif,webp,JPG,jpeg,JPEG,PNG',
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
            $roomType->save();

            if($request->amenities){
                $roomType->amenities()->attach($request->amenities);
            }

            if($request->hasFile('feature_image')){
                $roomType->addMediaFromRequest('feature_image')
                    ->toMediaCollection('feature_image');
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

}
