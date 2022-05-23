<?php

namespace App\Http\Controllers\Drivers;

use App\Helper\GetModelsData;
use App\Helper\ModelsHelper;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Models\Ride;

class CreateRideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
        $cars = GetModelsData::getDriverCars($id);

        $cities = GetModelsData::getCities();
        return view('drivers.createRide') -> with(compact('cars' , 'cities'));
    }


    /**
     * Get data from drivers.createRide view to add it to Ride Model
     * @param Request $request
     * @return view redirect to drivers.createRide view after adding with success or failed msg
     */
    public function store(Request $request){
        if($request->car_id == null){
            return redirect()->back()->with(['error' => 'You must add a car first'])->withInput($request->input());
        }

        $create = Ride::create($request->all());
        if(!$create)
            return redirect()->back()->with(['error' => 'The ride is not Created']);

        return redirect()->back()->with(['success' => 'Ride Created Successfully']);
    }
}
