<?php

namespace App\Http\Controllers\PagesControllers;

use App\Helper\ModelsHelper;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\City;
use App\Models\Driver;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Http\Request;

class RidesController extends Controller
{

    /**
     * Get the rides view page with car information
     * with [car's-driver , car's-user , car's-rides]
     * and cities information
     * */
    public function index(){
        return ModelsHelper::getRidesToView('rides');
    }

}
