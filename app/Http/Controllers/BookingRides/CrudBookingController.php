<?php

namespace App\Http\Controllers\BookingRides;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\RideRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CrudBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * store ride_request from client in ride_requests table
     * send notification to driver
     * */
    public function store(Request $request){
        $ride_requests = RideRequest::select('ride_id' , 'user_id')->where('ride_id' , $request->ride_id)
                                           -> where('user_id' , $request->user_id)->get();
        if(count($ride_requests) == 0){
            $ride_request = RideRequest::create(['ride_id' => $request->ride_id , 'user_id' => $request->user_id ,
                                'driver_id' => $request -> driver_id]);
            $notification = Notification::create([
                'sender_user_id' => $request ->user_id,
                'user_id' => $request -> driver_id,
                'message' => 'you have a ride request to ' . $request->ride_name . ' ride from ' . $request->user_name,
                'url' => 'url',
                'ride_id' => $request->ride_id,
                'ride_request_id'=> $ride_request ->id
            ]);
            return redirect()->back()->with(['success' => 'Request Sent Successfully']);
        }
        return redirect()->back()->with(['error' => 'Request Not Sent .. Request Sent previously or no empty seats']);
    }

}
