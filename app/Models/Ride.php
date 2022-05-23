<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    protected $table = 'rides';

    /*
     * 21 columns
     * location : optional choice : specific location in any city
     * enroute_city : city in middle between source and destination cities
     * allowed : optional choice : what allowed to do in car
     * */
    protected $fillable = ['id' , 'car_id' , 'source_city_id', 'location_in_source_city' ,
                            'enroute_city_id' , 'location_in_enroute_city','destination_city_id' ,
                            'location_in_destination_city', 'enroute_client_cost' , 'ride_name' ,
                            'number_of_seats' , 'client_cost' ,
                            'allowed_smoking' , 'allowed_animals','allowed_music', 'allowed_food',
                            'start_date' , 'start_time' , 'arrive_date' ,'arrive_time' ,
                            'ride_status' , 'created_at' , 'updated_at'];

    public $timestamps = true;


    ### Start Relation functions ###
    /**
     * Get the car that makes this Ride
    */
    public function car(){
        return $this->belongsTo('App\Models\Car' , 'car_id');
    }
    /**
     * Get the Source city to this ride
     */
    public function sourceCity(){
        return $this->belongsTo('App\Models\City' , 'source_city_id');
    }
    /**
     * Get the Destination city to this ride
     */
    public function destinationCity(){
        return $this->belongsTo('App\Models\City' , 'destination_city_id');
    }
    /**
     * Get the Enroute city to this ride
     */
    public function enrouteCity(){
        return $this->belongsTo('App\Models\City' , 'enroute_city_id');
    }
    ### End Relation functions ###


    ### Start Accessors & Mutators functions ###
    /**
     * change ride_status : 1 to "Ride is Active" And : 0 to "Ride not Active"
     */
    public $rideStatus = 0;
    public function getRideStatusAttribute($value){
        $this->rideStatus = $value;
        return $value == 1 ? __('messagesGlobal.rideIsActive') : __('messagesGlobal.rideNotActive');
    }
    /**
     * change allowed_smoking : 1 to "Yes" And : 0 to "No"
     */
    public function getAllowedSmokingAttribute($value){
        return $value == 1 ? 'Yes' : 'No';
    }
    /**
     * change allowed_music : 1 to "Yes" And : 0 to "No"
     */
    public function getAllowedMusicAttribute($value){
        return $value == 1 ? 'Yes' : 'No';
    }
    /**
     * change allowed_animals : 1 to "Yes" And : 0 to "No"
     */
    public function getAllowedAnimalsAttribute($value){
        return $value == 1 ? 'Yes' : 'No';
    }
    /**
     * change allowed_animals : 1 to "Yes" And : 0 to "No"
     */
    public function getAllowedFoodAttribute($value){
        return $value == 1 ? 'Yes' : 'No';
    }
    ### End Accessors & Mutators functions ###

}
