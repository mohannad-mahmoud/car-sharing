<?php

namespace App\Helper;

use App\Models\Car;
use App\Models\Ride;
use Carbon\Carbon;

class Helper {

    /**
     * check if this driver has this id
     * */
    public static function isCurrentDriverId($id){
        if(isset(Auth()->user()->driver->id))
            return Auth()->user()->driver->id == $id;
        return false;
    }

    /**
     * check if this user a driver
    */
    public static function isThisUserDriver(){
        return Auth()->user()->driver != null;
    }


    /**
     * check if this ride belongs to current user driver
     * */
    public static function checkRideBelongsToDriver($ride_id){
        $ride = Ride::find($ride_id);
        $car = Car::find($ride->car_id);
        if(!Helper::isCurrentDriverId($car->driver_id))
            return false;
        return true;
    }

    public static function checkCarBelongsToDriver($car_id){
        $car = Car::find($car_id);
        if(!Helper::isCurrentDriverId($car->driver_id))
            return false;
        return true;
    }


    /**
     * get arrive_date and arrive_time from rides table and separate it.
     * */
    public static function getDate(){
        $ride = Ride::selectRaw('id , car_id , ride_status ,year(arrive_date) as year ,
                                            month(arrive_date) as month ,
                                             day(arrive_date) as day ,
                                            hour(arrive_time) as hour ,
                                             minute(arrive_time) as minute ,
                                              second(arrive_time) as second')->get();
        return $ride;
    }
    public static function getNow(){
        $date = ['date' => Carbon::now()];
        $date['year'] = Carbon::now()->year;
        $date['month'] = Carbon::now()->month;
        $date['day'] = Carbon::now()->day;
        $date['hour'] = Carbon::now()->hour;
        $date['minute'] = Carbon::now()->minute;
        $date['second'] = Carbon::now()->second;
        return $date;
    }

    /**
     * close all rides that out of date : current data > arrive date
     * */
    public static function closeDateOutRidesAuto(){
        $rides = self::getDate();
        $date = self::getNow();
        foreach ($rides as $ride){
            if($date['year'] > $ride->year)
                $ride->update(['ride_status' => '0']);
            elseif($date['year'] == $ride->year && $date['month'] > $ride->month)
                $ride->update(['ride_status' => '0']);
            elseif($date['year'] == $ride->year && $date['month'] == $ride->month && $date['day'] > $ride->day)
                $ride->update(['ride_status' => '0']);
            elseif($date['year'] == $ride->year && $date['month'] == $ride->month && $date['day'] == $ride->day &&
                $date['hour'] > $ride->hour)
                $ride->update(['ride_status' => '0']);
            elseif($date['year'] == $ride->year && $date['month'] == $ride->month && $date['day'] == $ride->day &&
                $date['hour'] == $ride->hour && $date['minute'] > $ride->minute )
                $ride->update(['ride_status' => '0']);
            elseif($date['year'] == $ride->year && $date['month'] == $ride->month && $date['day'] == $ride->day &&
                $date['hour'] == $ride->hour && $date['minute'] == $ride->minute  && $date['second'] > $ride->second)
                $ride->update(['ride_status' => '0']);
        }
    }

    public static function getCarImage($car){
        return 'assets/img/cars/driver_' . $car->driver_id . '/' . $car->image;
    }

}
