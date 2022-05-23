<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'comment' , 'user_id' , 'driver_id' , 'status' , 'rating' , 'name'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }
}
