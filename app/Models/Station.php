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
        'districtCode',
        'districtName',
        'stationType',
        ];
    public $incrementing = false;

    public $stationsWithImage = [
        '001',
        '002',
        '003',
        '011',
        '017',
    ];

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

    public function getNearbyStations()
    {
        return app(BikeApiService::class)->getNearbyStations($this->id);
    }

    public function getHasStationImageAttribute()
    {
        return in_array($this->id, $this->stationsWithImage);
    }

    public function getAddressAttribute()
    {
        return $this->attributes['address'] . ' ' . $this->attributes['addressNumber'] . ($this->attributes['zipCode'] ? ', ' . $this->attributes['zipCode'] : '');
    }

    public function getAvailableBikesStatusBgColorAttribute()
    {
        if($this->available_bikes > 5) {
            return 'bg-green-500';
        }elseif($this->available_bikes > 0) {
            return 'bg-orange-500';
        }else {
            return 'bg-red-500';
        }
    }
    public function getAvailableBikesStatusTextColorAttribute()
    {
        if($this->available_bikes > 5) {
            return 'text-green-500';
        }elseif($this->available_bikes > 0) {
            return 'text-orange-500';
        }else {
            return 'text-red-500';
        }
    }

    public function getAvailableSlotsStatusBgColorAttribute()
    {
        if($this->slots > 5) {
            return 'bg-green-500';
        }elseif($this->slots > 0) {
            return 'bg-orange-500';
        }else {
            return 'bg-red-500';
        }
    }
    public function getAvailableSlotsStatusTextColorAttribute()
    {
        if($this->slots > 5) {
            return 'text-green-500';
        }elseif($this->slots > 0) {
            return 'text-orange-500';
        }else {
            return 'text-red-500';
        }
    }
}
