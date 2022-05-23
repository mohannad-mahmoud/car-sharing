<?php

namespace App\Http\Controllers\PagesControllers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        if(isset($_GET['search']))
            $search = $_GET['search'];
            $data = $this->getUserSearch($search);
            return view('search')->with(compact('data'));
    }

    public function getUserSearch($search){
        return $user = User::where('name' , 'like' , '%'.$search.'%')->get();
    }

//    public function getRideSearch($search){
//        $ride = Ride::where('ride_name' , $search)->with('car');
//    }

    public function getCitySearch($search){

    }

    public function getCarSearch($search){

    }

    public function getAllSearch($search){

    }
}
