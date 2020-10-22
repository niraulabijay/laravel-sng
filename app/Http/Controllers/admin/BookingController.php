<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBooking;
use App\Model\Booking;
use App\Model\Room;
use App\Model\RoomType;
use App\Repositories\booking\BookingInterface;
use App\Repositories\hotel\HotelRepository;
use App\Repositories\roomType\RoomTypeRepository;
use App\Repositories\user\CustomerInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    protected $baseView = 'admin.bookings.';
    public function __construct(BookingInterface $bookingRepository, HotelRepository $hotelRepository, RoomTypeRepository $roomTypeRepository, CustomerInterface $userRepository)
    {
        $this->bookingRepo = $bookingRepository;
        $this->hotelRepo = $hotelRepository;
        $this->roomTypeRepo = $roomTypeRepository;
        $this->userRepo = $userRepository;
    }

    public function index(){

        return $this->bookingRepo->all();
    }

    public function new(){
        $hotel = $this->hotelRepo->getAuthHotel();
        return view($this->baseView.'create.new',compact('hotel'));
    }

    public function checkAvailable(Request $request){
        try{
            $hotel = $this->hotelRepo->findById($request->hotel_id);
            $roomTypes = $hotel->roomTypes->where('status','Active');
            $availableRooms = $this->bookingRepo->availableRooms($request->all());
            foreach($roomTypes as $roomType){
                $roomType->available_rooms = $availableRooms->where('room_type_id',$roomType->id);
                if($roomType->available_rooms->count() == 0){
                    $roomType->is_available = 0;
                }else{
                    $roomType->is_available = 1;
                }
            }
            // dd($roomTypes[0]);
            $roomTypes = $roomTypes->where('is_available',1);
            $persons = $request->persons;
            $checkIn = $request->checkIn;
            $checkOut = $request->checkOut;
            $view = view($this->baseView.'create.roomTypesChoice',compact('roomTypes','persons','checkIn','checkOut'))->render();
            return response()->json($view, 200);
        }catch(\Exception $e){
            $msg = $e->getMessage();
            $view = view('admin.errors.ajaxAlert',compact('msg','e'))->render();
            return response()->json($view,200);
        }
    }

    public function proceedBooking(Request $request){
        // dd($request);
        $guestsArray = $request->guests ?? [];
        $unitsArray = $request->unit ?? [];
        $totalGuests = 0;
        foreach($guestsArray as $arr){
            $totalGuests += array_sum($arr);
        }

        if($request->selectedPersons != $totalGuests){
            return response()->json('No of guests in rooms does not match initial selection. Please modify values or begin from the top',400);
        }
        $roomTypeIds = array_keys($guestsArray);
        $roomTypes = $this->roomTypeRepo->getByIds($roomTypeIds);
        foreach($roomTypes as $roomType){
            $roomIds = $unitsArray[$roomType->id];
            if(count($roomIds) != count(array_unique($roomIds))){
                return response()->json('Multiple selection of same room unit. Please modify form values.',400);
            }
            $roomType->selectedRooms = Room::whereIn('id',$roomIds)->get(['id','room_type_id','title','description']);
            foreach($roomType->selectedRooms as $r){
                $r->guests = $guestsArray[$roomType->id][$r->id];
            }
        }
        $context = new Collection();
        foreach($request->all() as $key=>$value){
            $context[$key] = $value;
        }
        // dd($context);
        $date1=date_create($context['selectedCheckIn']);
        $date2=date_create($context['selectedCheckOut']);
        $diff=date_diff($date1,$date2);
        $context['nights'] = $diff->format('%a');

        $view = view($this->baseView.'create.finalForm',compact('roomTypes','context'))->render();
        return response()->json($view,200);
    }

    public function finalize(CreateBooking $request){
        $validated = $request->validated();
        try{
            $user = $this->userRepo->findByEmail($validated['email']);
            if(!$user){
                $user = $this->userRepo->createDefaultUser([
                    'email' => $validated['email'],
                    'name' => $validated['first_name'].' '.$validated['last_name'],
                    'password' => $this->userRepo->defaultPassword
                ]);
            }
            $booking = $this->bookingRepo->adminBooking($user, $validated);
            dd($booking);
        }catch(\Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }
}
