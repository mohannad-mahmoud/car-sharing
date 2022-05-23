<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RideRequest extends Model
{

    /*
     * user_id current user in users
     * driver_id the user in users not in drivers
     * */
    protected $table = 'ride_requests';
    protected $fillable = ['id' , 'ride_id' , 'user_id' , 'driver_id' , 'request_status'];
    protected $hidden = ['created_at' , 'updated_at'];  

    public $timestamps = true;


    public function notifications(){
        return $this->hasMany('App\Models\Notification' , 'ride_request_id');
    }
}
