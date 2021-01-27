<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBooking;
use App\Http\Resources\room\RoomTypeResource;
use App\Model\Booking;
use App\Model\GuestBooking;
use App\Model\Room;
use App\Model\RoomType;
use App\Repositories\booking\BookingInterface;
use App\Repositories\user\CustomerInterface;
use Cartalyst\Sentinel\Users\UserInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    protected $bookingRepo;
    protected $userRepo;

    public function __construct(BookingInterface $bookingRepo,CustomerInterface $userRepo)
    {
        $this->bookingRepo = $bookingRepo;
        $this->userRepo = $userRepo;

    }
   
    public function search(Request $request)
    {
        
        $search = $request->all();
        $room_search = $this->bookingRepo->availableRoomsType($search);
        
        $data['checkIn'] = $search['selectionRange']['startDate'];
        $data['checkOut'] = $search['selectionRange']['endDate'];
        $available = $this->bookingRepo->availableRooms($data);
        foreach($available as $room)
        {
            $room = RoomType::findOrFail($room->room_type_id);
            if(in_array($room,$room_search))
            {
                array_push($room_search,$room);
            }
        }   
        return RoomTypeResource::collection(array_unique($room_search));
        
       
    }

    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'country' => 'required',
            'email' => 'required',
            'guests' => 'required',
            'selectedCheckIn'=>'',
            'selectedCheckOut'=>'',
            'room_price' => '',
            'address' => '',
            'city' => '',
            'post_code' => '',
            'phone' => '',
            'message' => '',
        ]);

        try{
            DB::beginTransaction();
            $user = $this->userRepo->findByEmail($validated['email']);
            if(!$user)
            {
                $user = $this->userRepo->createDefaultUser([
                    'email' => $validated['email'],
                    'name' => $validated['first_name'].' '.$validated['last_name'],
                    'password' => $this->userRepo->defaultPassword
                ]);
            }
            $validated['user_id'] = $user->id;
            $booking = $this->bookingRepo->store($validated);
            if($booking)
            {
                DB::commit();
                $success = true;
                return response()->json($booking,200);
            }else{
                DB::rollBack();
                return response()->json("Failed to complete booking",400);
            }

            
        }
        catch(QueryException $e){
            DB::rollBack();
            return response()->json($e->getMessage(),400);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json($e->getMessage(),400);
        }
        
    }
}
