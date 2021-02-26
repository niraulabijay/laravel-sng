<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $total_booking = Booking::count();
       
        $data = [];
        $booking_status = [];
        $check_booking = Booking::all();
        $pending = 0;
        $cancel = 0;
        $paid = 0;
        foreach($check_booking as $value)
        {
            switch($value->status)
            {
                case 1:
                    $pending +=1;
                    break;
                case 3:
                    $paid +=1;
                    break;
                case 4:
                    $cancel +=1;
                    break;
            
            }
         
        }
        array_push($booking_status,$paid,$pending,$cancel);
   
        $booking = Booking::select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(created_at) as monthname"))
        ->whereYear('created_at', date('Y'))
        ->groupBy('monthname')
        ->get();
       
        foreach($month as $output)
        {
            // date('M',strtotime($booking->first()->monthname));
           if($value = $booking->where('monthname',$output)->first()){
            
                array_push($data,$value->count);
           }else{
                array_push($data,0);
           }
          
        }   
        $recent_orders = Booking::orderBy('id','DESC')->get()->take(7);
      
        return view('admin.index',compact('data','total_booking','booking_status','recent_orders'));
    }
}
