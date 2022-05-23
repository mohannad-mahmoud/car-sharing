<?php

namespace App\Models;

use App\Models\Driver;
use App\Models\Ride;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id' , 'name', 'email','facebook','profile','about' ,  'password','gender','birthday','mobile','user_type' , 'number_of_unread_notifications'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the driver info if exist from this User
     * */
    public function driver(){
        return $this -> hasOne('App\Models\Driver' , 'user_id');
    }

    public function notifications()
    {
        return $this -> hasMany('App\Models\Notification' , 'user_id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

}
