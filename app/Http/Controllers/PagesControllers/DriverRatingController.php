<?php

namespace App\Http\Controllers\PagesControllers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Rating;
use Illuminate\Http\Request;

class DriverRatingController extends Controller
{
    public function show($id)
    {
        $driver = Driver::find($id);
        $newsData = Rating::where('driver_id', $id)->get();

        return view('ratings.driverRating', compact('driver' , 'newsData'));
    }
}
