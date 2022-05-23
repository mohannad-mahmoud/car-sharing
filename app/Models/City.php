<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = ['id' , 'name'];

    /**
     * Get the Rides that came from this city
     */
    public function ridesSource(){
        return $this->hasMany('App\Models\Ride' , 'source_city_id');
    }
    /**
     * Get the Rides that came to this city
     */
    public function ridesDestination(){
        return $this->hasMany('App\Models\Ride' , 'destination_city_id');
    }
    /**
     * Get the rides that will pass in this city
     */
    public function ridesEnroute(){
        return $this->hasMany('App\Models\Ride' , 'enroute_city_id');
    }

}
