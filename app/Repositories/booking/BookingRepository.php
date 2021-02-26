<?php

namespace App\Repositories\booking;

use App\Model\Booking;
use App\Model\BookingDetail;
use App\Model\Room;
use App\Model\RoomType;
use App\Notifications\BookingSuccess;
use App\Repositories\EloquentRepository;
use App\Repositories\booking\BookingInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BookingRepository extends EloquentRepository implements BookingInterface{

    public function __construct(Booking $model)
    {
        parent::__construct($model);
    }

    public function all(){
        return Booking::where('status','Active')
            ->get()
            ->map(function($booking){
                return [
                    'title' => $booking->title,
                    'value' => $booking->value,
                ];
            });
    }

    //useful helper
    public function find($id){
        $booking = $this->model->findById($id);
        return $this->format($booking);
    }

    

    public function availableRooms($data = [])
    {
        $checkIn = $data['checkIn'];
        $checkOut = $data['checkOut'];
     
        $rooms = Room::whereDoesntHave('bookings', function ($query) use($checkIn, $checkOut){
            $query->where(function ($q2) use ($checkIn, $checkOut) 
            {
                $q2->where('check_in', '<=', $checkIn)
                    ->where('check_out', '>', $checkIn)
                    ->where('check_out','<=',$checkOut)
                    ->whereIn('status',[1,2,3]);

                })
                ->orWhere(function ($q2) use ($checkIn, $checkOut) {
                    $q2->where('check_in', '>=', $checkIn)
                        ->where('check_in', '<', $checkOut)
                        ->whereIn('status',[1,2,3]);
                })
                ->orWhere(function ($q2) use ($checkIn, $checkOut) {
                    $q2->where('check_out', '>', $checkIn)
                        ->where('check_out', '<=', $checkOut)
                        ->whereIn('status',[1,2,3]);
                        
                })
                ->orWhere(function ($q2) use ($checkIn, $checkOut) {
                    $q2->where('check_in', '<', $checkIn)
                        ->where('check_out', '>', $checkOut)     
                        ->whereIn('status',[1,2,3]);   
                });
            })->get();
     
        return $rooms;
    

//      Old Logic
//        with('bookings')->whereHas('bookings', function ($q) use ($checkIn, $checkOut) {
//            $q->where('status','!=',Booking::STATUS_CANCELLED)
//                ->where(function ($q2) use ($checkIn, $checkOut) {
//                    $q2->where('check_in', '>=', $checkOut)
//                        ->orWhere('check_out', '<=', $checkIn);
//                });
//        })->orWhereDoesntHave('bookings')->get();

    }

    public function availableRoomsType($data,$all_rooms)
    {
        $rooms = [];
       
        foreach($all_rooms as $room)
        {
            foreach($data['occupancy'] as $key=>$occupancy)
            {
                $room_type = RoomType::where('id',$room->id)->whereHas('rooms')->where('no_of_adult','>=',$occupancy['adult'])
                ->where('no_of_child','>=',$occupancy['child'])
                ->where('max_occupancy','>=',$data['occupancy'][$key]['adult']+$data['occupancy'][$key]['child'])
                ->first();
                
                if($rooms == null && $room_type)
                {
                   if($room_type->rooms()->count() >= count($data['occupancy']))
                   {
                    array_push($rooms,$room_type);
                   }
                   
                }
                else
                {
                    // if($this->existsInArray($room_type,$rooms))
                    // {
                    //     array_push($rooms,$room_type);
                    // }
                   
                    if($room_type && !in_array($room_type, $rooms, true))
                    {
                        if($room_type->rooms()->count() >= count($data['occupancy']))
                        {
                                array_push($rooms,$room_type);
                        }
                    }
                  
                }
    
    
            }
        }
       
        return $rooms;

    }

    public function existsInArray($entry, $array) {

        foreach ($array as $compare) {
            if ($compare->id == $entry->id)
            {
                return false;
            }
        }
        return true;
    }

    public function adminBooking($user, $data){
      
        $data['user_id'] = $user->id;
        $booking = $this->store($data);
        
        foreach($data['guests'] as $key=>$guest){
            $bookingDetails = BookingDetail::create([
                'booking_id'=>$booking->id,
                'room_id' => $key,
                'guests' => $guest,
                'allocated_price' => $data['room_price'][$key] ?? 0,
            ]);
        }
        return $booking;
    }
    public function store($data){

        return Booking::create([
            'user_id' => $data['user_id'],
            'check_in' => $data['selectedCheckIn'],
            'check_out' => $data['selectedCheckOut'],
            'status' => Booking::STATUS_ACTIVE,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'] ?? null,
            'postCode' => $data['post_code'] ?? null,
            'city' => $data['city'] ?? null,
            'country' => $data['country'] ?? null,
            'phone' => $data['phone'] ?? null,
            'message' => $data['message'] ?? null,
            'gender' => $data['radioOption'] ?? null
        ]);
    }

    public function apiBooking($user,$data)
    {
        
        $data['user_id'] = $user->id;
        $discount_amount = 0;
        $room = RoomType::with('rooms')->find($data['room_id']);

        if($room->tax_status)
        {
            $data['tax'] = getSiteSetting('tax_value');
        }
        else
        {
            $data['tax'] = 0;
        }
        if(RoomType::where('id' , $room->id)->where('end_date', '>=',  Carbon::now()->toDateString())
        ->exists() && $room->offer_price != 0)
        {
            $discount_amount = $room->offer_price;
        }
        else if(RoomType::where('id' , $room->id)->where('end_date', '>=',  Carbon::now()->toDateString())
        ->exists() && $room->discount_percent !=0)
        {
            $discount_amount = ($room->discount_percent/100)*$room->base_price;
        }
        $booking = $this->BookingApiStore($data);
        $data['checkIn'] = $data['startDate'];
        $data['checkOut'] = $data['endDate'];
        $available_rooms = $this->availableRooms($data);
        $all_rooms = RoomType::where('id',$data['room_id'])->where('status','Active')->get();
        $room_search = $this->availableRoomsType($data,$all_rooms);
        
        $room_type_filter = [];
        if($room_search && $available_rooms)
        {
            
            $pending_room= collect($room_search)->first()->rooms;

            // $confirm_room = $pending_room->merge($available_rooms);
            // $confirm_room = $confirm_room->unique(function ($item) {

            //     return $item;
            // });
            
            $confirm_room =  $available_rooms->each(function ($value, $key) use ($pending_room){
                return collect($pending_room)->contains($value);
            });
          
            $confirm_room = $confirm_room->unique(function ($item) {

                return $item;
            });
            
            // foreach($confirm_room->all() as $value)
            // {
            //     if($value['room_type_id'] == $data['room_id'])
            //     {
            //         array_push($room_type_filter,$value);
            //     }
            // }
            foreach($confirm_room as $value)
            {
                if($value['room_type_id'] == $data['room_id'])
                {
                    array_push($room_type_filter,$value);
                }
            }
            // return $room_type_filter;

           
        }
        else
        {
            DB::rollBack(); 
            return response()->json("room is already booked or no room not found",500);
        }
        
        $bookingDetails = null;
        if($room_type_filter)
        {
            foreach($data['occupancy'] as $key=>$guest)
            {

                $bookingDetails = BookingDetail::create([
                    'booking_id'=>$booking->id,
                    'room_id' => $room_type_filter[$key]['id'],
                    'guests' => $guest['adult'] + $guest['child'],
                    'allocated_price' => $data['room_price'] ?? 0,
                    'discount_amount' =>  $discount_amount
                ]);

            }
        }
        else
        {

            DB::rollBack(); 
            return response()->json("room is already booked",500);
        }
        $payment = null;
        if($bookingDetails)
        {
           $payment = $booking->payment()->create([
            'booking_id' => $booking->id,
            'payment_method'=>'offline',
            'payment_status'=>'unpaid',
           ]);
            $user->notify(new BookingSuccess($booking,$room));
            
        }
        else
        {
            DB::rollBack(); 
            return response()->json("something went wrong!!",500);
        }
        if($bookingDetails && $payment)
        {
            $booking['email'] =$user->email;
          
            return response()->json($booking,200);
        }else
        {
            DB::rollBack(); 
            return response()->json("something went wrong!!",500);
        }
        
       

    }
   

    public function BookingApiStore($data)
    {

        return Booking::create([
            'user_id' => $data['user_id'],
            'check_in' => $data['startDate'],
            'check_out' => $data['endDate'],
            'status' => Booking::STATUS_ACTIVE,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'] ?? null,
            'postCode' => $data['post_code'] ?? null,
            'city' => $data['city'] ?? null,    
            'country' => $data['regionOption'] ?? null,
            'phone' => $data['phone'] ?? null,
            'message' => $data['message'] ?? null,
            'gender' => $data['radioOption'] ?? null,
            'tax'=> $data['tax']
         
        ]);
    }
    

    protected function format(Booking $booking){
        return [
            'title' => $booking->title,
            'value' => $booking->value,
            'created_at'=> $booking->created_at->diffForHumans(),
        ];
    }

    public function getFilterData($params){
        $bookings = Booking::query();
        $bookings = $bookings->where('created_at','>',$params['startDate'])
            ->where('created_at','<=',$params['endDate']);
        if(count($params['status']) > 0){
            $bookings = $bookings->whereIn('status',$params['status']);
        }
        $bookings = $bookings->orderBy('id','desc')->get();
        return $bookings;
    }

    public function updatePrice($booking)
    {
        $bookingDetails = $booking->bookingDetails ?? [];
        $sum = 0;
        $start = strtotime($booking->check_in);
        $end = strtotime($booking->check_out);
        $days_between = ceil(abs($end - $start) / 86400);
        foreach($bookingDetails as $bookingDetail){
            $sum += $bookingDetail->allocated_price*(int)$days_between;
        }
        $booking->booking_room_price = $sum;
        $booking->update();
        $booking->update();
        return $booking;
    }

    public function updateBooking($booking,$request)
    {    
       $booking = Booking::findOrFail($booking['data']);
       if($booking->status == 1)
       {
            $booking->status =3;
       }
       else
       {
        $booking->status = 1;
       }
       
       $booking->update([$booking]);
       return response()->json($booking);
    }

    public function updateBookingStatus($request)
    {
        $booking = Booking::findOrFail($request['id']);
        $booking->status = $request['status'];
        $booking->update([$booking]);
        return response()->json($booking);

    }

}

