<?php

namespace App\Repositories\booking;

use App\Model\Booking;
use App\Model\BookingDetail;
use App\Model\Room;
use App\Model\RoomType;
use App\Repositories\EloquentRepository;
use App\Repositories\booking\BookingInterface;

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

    public function availableRooms($data = []){
        $checkIn = $data['checkIn'];
        $checkOut = $data['checkOut'];
        $rooms = Room::whereDoesntHave('bookings', function ($query) use($checkIn, $checkOut){
            $query->where(function ($q2) use ($checkIn, $checkOut) {
                $q2->where('check_in', '<=', $checkIn)
                    ->where('check_out', '>', $checkIn)
                    ->where('check_out','<=',$checkOut);
                })
                ->orWhere(function ($q2) use ($checkIn, $checkOut) {
                    $q2->where('check_in', '>=', $checkIn)
                        ->where('check_in', '<', $checkOut);
                })
                ->orWhere(function ($q2) use ($checkIn, $checkOut) {
                    $q2->where('check_out', '>', $checkIn)
                        ->where('check_out', '<=', $checkOut);
                })
                ->orWhere(function ($q2) use ($checkIn, $checkOut) {
                    $q2->where('check_in', '<', $checkIn)
                        ->where('check_out', '>', $checkOut);
                })

            ;
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
        if(count($params['roomTypes']) > 0){
            $roomTypes = RoomType::whereIn('id',$params['roomTypes'])->get();
            $rooms = Room::whereIn('room_type_id',$roomTypes->pluck('id')->toArray() ?? [])->get();
            // return $rooms;
            $booking = $bookings->whereHas('bookingDetails', function ($query) use($rooms) {
                foreach($rooms as $room){
                    $query->where('room_id', $room->id);
                }
            });
            with(['bookingDetails' => function ($query) use ($rooms) {
                $query->whereIn('room_id',$rooms->pluck('id')->toArray() ?? []);
            }]);
        }
        $bookings = $bookings->get();
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

}

