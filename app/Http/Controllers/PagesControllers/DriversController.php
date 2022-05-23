<?php

namespace App\Http\Controllers\PagesControllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\City;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    /**
     * Get the drivers view page
     * */
    public function index(){
        $drivers = Driver::with('user' , 'cars' , 'ratings')->paginate(PAGINATE_NUMBER);
        return view('drivers')->with(compact('drivers'));
    }
}
