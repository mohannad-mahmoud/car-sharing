<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ride;

class Driver extends Model
{
    protected $table = 'drivers';

    /*
     * permanent driver : mean that this driver always make rides : 1->yes , 0->no
     * */
    protected $fillable = ['id'  , 'user_id', 'permanent_driver' , 'driver_license'];

    public $timestamps = true;


    ### Start Relation functions ###
    /**
     * Get the Main User info from this Driver
     * */
    public function user(){
        return $this -> belongsTo('App\Models\User' , 'user_id');
    }
    /**
     * Get the Cars that this Driver has
    */
    public function cars(){
        return $this->hasMany('App\Models\Car' , 'driver_id');
    }
    /**
     * Get Rides that this Driver made
     */
    public function rides(){
        return $this->hasManyThrough('App\Models\Ride' , 'App\Models\Car' , 'driver_id' , 'car_id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    ### End Relation functions ###


    ### Start Accessors & Mutators functions ###
    /**
     * Get permanent_driver attribute as word
     * 1=>Yes , 0=>No
     * Yes means that the driver is Permanent Driver
     * No means that the driver isn't Permanent Driver
     */
    public function getPermanentDriverAttribute($value){
        return $value == 1 ? 'Yes' : 'No';
    }
    ### End Accessors & Mutators functions ###

}
