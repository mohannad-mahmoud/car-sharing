<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = ['id' , 'user_id' , 'sender_user_id' ,'ride_request_id', 'created_at' , 'updated_at' , 'message' ,'ride_id' ,'url', 'seen'];

    public $timestamps = true;

    public function rideRequests(){
        return $this->belongsTo('App\Models\RideRequest' , 'ride_request_id');
    }
}
