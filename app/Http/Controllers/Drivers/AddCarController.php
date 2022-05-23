<?php

namespace App\Http\Controllers\Drivers;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Traits\Images;
use Illuminate\Http\Request;

class AddCarController extends Controller
{

    use Images;
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * show add car page after check if this user is driver
     * */
    public function index($driver_id){
        if(Helper::isCurrentDriverId($driver_id))
            return view('drivers.addCar')->with(compact('driver_id'));
        return redirect()->back();
    }

    /**
     * save driver's car data to cars table after check if this user is driver
     * */
    public function store(Request $request , $driver_id){
        if(Helper::isCurrentDriverId($driver_id)){
            // get image data
//            $carImage = $request->file('image');
//            $carImageContents = $carImage->openFile()->fread($carImage->getSize());

            $car = Car::create([
                'driver_id' => $driver_id,
                'maker' => $request->maker,
                'model' => $request->model,
                'color' => $request->color,
                'max_of_seats' => $request->max_of_seats,
                'make_year' => $request->make_year,
                'car_type' => $request->car_type,
                'image' => $this->savePhoto($request->image , 'assets/img/cars/driver_' . $driver_id . '/'),
            ]);

            if($car)
                return redirect()->back()->with(['success' => 'Car is added']);
            return redirect()->back()->with(['error' => 'Car not added']);
        }
        return redirect()->back();
    }

}
