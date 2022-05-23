<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Ride;
use App\Models\RideRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Get notification page with seen and unseen notifications
     * */
    public function index(){
        $notifications_unseen = Notification::with('rideRequests')->where('user_id' , Auth::id())->where('seen' , 0)->get();
        $notifications_seen = Notification::with('rideRequests')->where('user_id' , Auth::id())->where('seen' , 1)->get();
        Notification::where('user_id' , Auth::id())->update(['seen' => '1']);
        return view('notifications.notifications') -> with(compact('notifications_seen' , 'notifications_unseen'));
    }


    /**
     * Accept Ride Requests from notification page and send notification to client with response
     * update number_of_seats in ride table
     * update ride_request status
     *
     * */
    public function acceptRideRequest($rideRequest_id){
        $rideRequest = RideRequest::find($rideRequest_id);
        if($rideRequest->request_status != '1'){
            $ride = Ride::find($rideRequest->ride_id);
            $numberOfSeats = number_format($ride->number_of_seats);
            if($numberOfSeats > 0) {
                $numberOfSeats--;
                $rideRequest->update(['request_status' => '1']);
                $ride->update(['number_of_seats' => $numberOfSeats]);
                $notification = Notification::create([
                    'sender_user_id' => Auth::id(),
                    'user_id' => $rideRequest -> user_id,
                    'message' => 'you have a ride Accept response to ' . $ride->ride_name ,
                    'url' => 'url',
                    'ride_id' => $ride->id,
                    'ride_request_id'=> $rideRequest->id
                ]);
            }
        }
        return redirect()->back();
    }

    /**
     * Reject Ride Requests from notification page and send notification to client with response
     * */
    public function rejectRideRequest($rideRequest_id){
        $rideRequest = RideRequest::find($rideRequest_id);
        if($rideRequest->request_status != '-1') {
            $ride = Ride::find($rideRequest->ride_id);
            $numberOfSeats = number_format($ride->number_of_seats);
            if($rideRequest->request_status == '1')
                $numberOfSeats++;
            $rideRequest->update(['request_status' => '-1']);
            $ride->update(['number_of_seats' => $numberOfSeats]);
            $notification = Notification::create([
                'sender_user_id' => Auth::id(),
                'user_id' => $rideRequest->user_id,
                'message' => 'Sorry you have a ride Reject response to ' . $ride->ride_name,
                'url' => 'url',
                'ride_id' => $ride->id,
                'ride_request_id' => $rideRequest->id
            ]);
        }
        return redirect()->back();
    }



}
