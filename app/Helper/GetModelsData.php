<?php


namespace App\Helper;


use App\Models\Car;
use App\Models\City;
use App\Models\Driver;

class GetModelsData
{
    /**
     * @return City : all cities from Model City
     * */
    public static function getCities(){
        return City::get()->keyBy('id');
    }

    /**
     * @param $id
     * @return Car : all cars Belong to Driver with
     */
    public static function getDriverCars($id){
        return Driver::find($id)->cars;
    }

    /**
     * @param $car_id
     * @return Car : get car with id
     */
    public static function getCar($car_id){
        return Car::find($car_id);
    }

    /**
     * @param $driver_id
     * @return Driver: get driver with user and cars belong to this driver
     */
    public static function getDriverWithUserWithCars($driver_id){
        return Driver::with('cars' , 'user')->find($driver_id);
    }

    /**
     * @param $driver_id
     * @return Car : get car with rides belongs to driver
     */
    public static function getCarWithRidesBelongsToDriver($driver_id){
        return Car::with('rides')->where('driver_id' , $driver_id)->get();
    }


}
