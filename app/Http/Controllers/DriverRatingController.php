<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class DriverRatingController extends Controller
{
    public function getDriverRating($id){

//        return ['hello'];
        return $driver = Rating::where('driver_id' , $id)->get();
    }

    public function setDriverRating($user_id , $driver_id){
        $comment = $_POST['description'];
        $rate = $_POST['rating'];
        $name = $_POST['name'];

        $rating = Rating::where('user_id', $user_id)->where('driver_id', $driver_id)->first();

        if (!empty($rating)) {
            $rating->user_id = $user_id;
            $rating->driver_id = $driver_id;
            $rating->rating = $rate;
            $rating->comment = $comment;
            $rating->status = 1;
            $rating->name = $name;
            try {
                $rating->update();
            } catch (\Throwable $th) {
                throw $th;
            }
            session()->flash('message', 'Success!');
        } else {
            $rating = new Rating;
            $rating->user_id = $user_id;
            $rating->driver_id = $driver_id;
            $rating->rating = $rate;
            $rating->comment = $comment;
            $rating->status = 1;
            $rating->name = $name;
            try {
                $rating->save();
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->hideForm = true;
        }


        return redirect()->to(app()->getLocale().'drivers/' . $driver_id);
    }

}
