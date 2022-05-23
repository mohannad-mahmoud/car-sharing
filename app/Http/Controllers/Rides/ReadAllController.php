<?php

namespace App\Http\Controllers\Rides;

use App\Helper\ModelsHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReadAllController extends Controller
{
    public function rideReadAll($ride_id){
        return ModelsHelper::getRideToView('rides.rideReadAll' , $ride_id);
    }
}
