<?php

namespace App\Http\Controllers\Drivers;

use App\Helper\GetModelsData;
use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\City;
use App\Models\Driver;
use App\Models\Ride;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrudDriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * show the driver's rides if after check if this user is driver
     * */
    public function showDriverRides($driver_id){
//        if(!Helper::isCurrentDriverId($driver_id))
//            return redirect()->back();
        Helper::closeDateOutRidesAuto();
        $driver= GetModelsData::getDriverWithUserWithCars($driver_id);
        $cars = GetModelsData::getCarWithRidesBelongsToDriver($driver_id);
        $city = GetModelsData::getCities();
        return view('drivers.showDriverRides')->with(compact('driver' , 'cars' , 'city'));
    }

    /**
     * open editing ride page after check if this user is driver
     * */
    public function editDriverRide($ride_id){
        if(Helper::checkRideBelongsToDriver($ride_id)){
            $ride = Ride::with('car')->where('id' , $ride_id)->first();
            $cars = Car::with('driver')->get()->where('driver_id' , Auth()->user()->driver->id);
            $cities = GetModelsData::getCities();
            return view('drivers.editDriverRide')->with(compact('ride' , 'cars' , 'cities'));
        }
        return redirect()->back();
    }

    /**
     * update driver's ride from editing page after check if this user is driver
    */
    public function updateDriverRide(Request $request , $ride_id){
        if(Helper::checkRideBelongsToDriver($ride_id)){
            $ride = Ride::find($ride_id)->update($request->all());
            if($ride)
                return redirect()->back()->with(['success' => 'ride updated']);
            else
                return redirect()->back()->with(['error' => 'ride not updated']);
        }
        return redirect()->back();
    }

    /**
     * close the driver's ride set[ ride_status = 0 ] after check if this user is driver
     */
    public function closeDriverRide($ride_id){
        if(Helper::checkRideBelongsToDriver($ride_id))
            $ride = Ride::find($ride_id)->update(['ride_status'=> '0']);
        return redirect()->back();
    }

    /**
     * Activate the driver's ride set[ ride_status = 1 ] after check if this user is driver
     */
    public function activateDriverRide($ride_id){
        if(Helper::checkRideBelongsToDriver($ride_id))
            $ride = Ride::find($ride_id)->update(['ride_status'=> '1']);
        return redirect()->back();
    }

    /**
     * Delete the driver's ride after check if this user is driver
     */
    public function deleteDriverRide($ride_id){
        if(Helper::checkRideBelongsToDriver($ride_id)){
            $ride = Ride::find($ride_id);
            if($ride)
                $ride->delete();
        }
        return redirect()->back();
    }
}
