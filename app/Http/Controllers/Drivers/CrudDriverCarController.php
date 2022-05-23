<?php

namespace App\Http\Controllers\Drivers;

use App\Helper\GetModelsData;
use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Driver;
use App\Traits\Images;
use Illuminate\Http\Request;

class CrudDriverCarController extends Controller
{

    use Images;

    public function showDriverCars($driver_id){
        if(Helper::isCurrentDriverId($driver_id)) {
            $driver = GetModelsData::getDriverWithUserWithCars($driver_id);
            return view('drivers.showDriverCars')->with(compact('driver'));
        }
        return redirect()->back();
    }

    public function editDriverCar($car_id){
        if(Helper::checkCarBelongsToDriver($car_id)){
            $car = GetModelsData::getCar($car_id);
            return view('drivers.editDriverCar')->with(compact('car'));
        }
        return redirect()->back();
    }

    public function deleteDriverCar($car_id){
        if(Helper::checkCarBelongsToDriver($car_id)) {
            $car = GetModelsData::getCar($car_id);
            if($car)
                $car->delete();
        }
        return redirect()->back();
    }

    public function updateDriverCar(Request $request , $car_id){
        if(Helper::checkCarBelongsToDriver($car_id)) {
            $car = GetModelsData::getCar($car_id);
            if($request->image != null)
                $image = $this->savePhoto($request->image , 'assets/img/cars/driver_' . $car->driver_id . '/');
            else
                $image = $car->image;
            $car->update([
                'driver_id' => $car->driver_id,
                'maker' => $request->maker,
                'model' => $request->model,
                'color' => $request->color,
                'image' => $image,
                'make_year' => $request->make_year,
                'car_type' => $request->car_type,
                'max_of_seats' => $request->max_of_seats
            ]);
            return redirect()->back()->with(['success' => 'Car updated Successfully']);
        }
        return redirect()->back()->with(['error' => 'Car not updated there are some problems']);
    }
}
