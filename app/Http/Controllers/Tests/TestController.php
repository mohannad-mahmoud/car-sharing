<?php

namespace App\Http\Controllers\Tests;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\City;
use App\Models\Driver;
use App\Models\Notification;
use App\Models\Ride;
use App\Models\RideRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//        $this->middleware('driver')->only('showDrivers');
//    }

    public function showUsers(){
        $users = User::with('driver')->get();
        return $users;
    }

    public function showDrivers(){
        $drivers = Driver::with('user' , 'cars' ,'rides' )->get();
        return $drivers;
    }

    public function showCars(){
        $cars = Car::with('driver')->with('rides')->get();
        return $cars;
    }

    public function show(){

        $notifications_seen = Notification::with('rideRequests')->where('user_id' , Auth::id())->where('seen' , 1)->get();
        return collect($notifications_seen);
    }
}

// display image from database
// return response()->make($user->profile , 200 , array('Content-Type' => (new \finfo(FILEINFO_MIME))->buffer($user->profile)));
