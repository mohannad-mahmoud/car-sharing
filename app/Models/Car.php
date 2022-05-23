<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = ['id' , 'driver_id' ,'maker' , 'model' , 'car_type','color','image' ,  'make_year','max_of_seats', 'created_at' , 'updated_at'];

    protected $hidden = ['created_at' , 'updated_at'];

    public $timestamps = true;

    /**
     * get the owner driver for this car
    */
    public function driver(){
        return $this->belongsTo('App\Models\Driver' , 'driver_id');
    }
    /**
     * Get the rides that this car made
    */
    public function rides(){
        return $this->hasMany('App\Models\Ride' , 'car_id');
    }

}
