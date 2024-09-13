<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'phone_number',
        'station_id',
        'start_time',
        'end_time',
        'subscription_type',
        'weekdays',
        'weekends',
    ];
}
