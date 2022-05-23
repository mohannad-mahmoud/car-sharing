<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function index($user_id){
        $user = User::with('driver')->find($user_id);
        if(isset($user->driver->id)) {
            $cars = Car::where('driver_id' , $user->driver->id)->get();
            return view('information.userInfo')->with(compact('user','cars'));
        }
        if($user) {
            return view('information.userInfo')->with(compact('user'));
        }

    }
}
