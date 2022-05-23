<?php


namespace App\Helper;


use App\Models\Car;
use App\Models\City;
use App\Models\Notification;
use App\Models\Rating;
use App\Models\Ride;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ModelsHelper
{

    /**
     * return view with information about rides
     * */
    public static function getRidesToView($view){
        Helper::closeDateOutRidesAuto();
        $cars = Car::with( 'driver' , 'rides')->whereHas('rides')->paginate(PAGINATE_NUMBER);
        $users = User::with('driver')->get()->keyBy('id');
        $city = City::get()->keyBy('id');
        return view($view)->with(compact('cars' , 'city' , 'users'));
    }

    /**
     * return view with information about specific ride
     * */
    public static function getRideToView($view , $ride_id){
        Helper::closeDateOutRidesAuto();
        $ride = Ride::with('car')->find($ride_id);
        $car = Car::with('driver')->find($ride->car->id);
        $driver = User::find($car->driver->user_id);
        $city = City::get()->keyBy('id');
        $user = User::find(Auth::id());
        $active_color = $ride->ride_status == __('messagesGlobal.rideIsActive') ? 'green' : 'red';
        return view($view)->with(compact('user','ride' , 'car' , 'driver' , 'city' , 'active_color'));
    }

    public static function number_of_unread_notifications(){
        $notifications = Notification::get()->where('user_id' , Auth::id())->where('seen' , 0);
        return count($notifications);
    }

    public static function rates($driver_id){
    $rates = Rating::where('driver_id', $driver_id)->get();
    $count = 0;
    if(count($rates) == 0)
        return 0;
    foreach ($rates as $rate){
        $count += intval($rate->rating);
    }
    return round($count/count($rates) , 2);
}

}
