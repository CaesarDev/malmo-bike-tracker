<?php

namespace App\Models;

use App\Services\BikeApiService;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = [
        'id',
        'name',
        'location',
        'address',
        'addressNumber',
        'zipCode',
        'available_bikes',
        'slots',
        'status',
        'calendarStatus',
        'operationalStatus',
        'connectivityStatus',
        'mobileCheckoutStatus',
        ];
    public $incrementing = false;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }
    public function getStatusData()
    {
        $stationStatuses = app(BikeApiService::class)->getStationStatus();
        $stationStatus = $stationStatuses[$this->id];

        $this->fill([
            'available_bikes' => $stationStatus['availability']['bikes'],
            'slots' => $stationStatus['availability']['slots'],
            'status' => $stationStatus['status'],
            'calendarStatus' => $stationStatus['statusDetail']['calendarStatus'],
            'operationalStatus' => $stationStatus['statusDetail']['operationalStatus'],
            'connectivityStatus' => $stationStatus['statusDetail']['connectivityStatus'],
            'mobileCheckoutStatus' => $stationStatus['mobileCheckoutStatus'],
        ]);

    }

}
