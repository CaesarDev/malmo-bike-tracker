<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class BikeApiService
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.malmobybike.se/api/map/',
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36',
            ]
        ]);
    }

    public function getStationStatus()
    {
        $content = Cache::remember('apiResponse', now()->addMinutes(10), function () {
            $response = $this->client->request('GET', 'stationStatus');
            return $response->getBody()->getContents();
        });

        return collect(json_decode($content, true))->keyBy('id');
    }

    public function getStationInfo()
    {
        $content = Cache::remember('stations', now()->addDays(10), function () {
            $response = $this->client->request('GET', 'station');
            return $response->getBody()->getContents();
        });
        return collect(json_decode($content, true))->keyBy('id');
    }

    public function getNearbyStations($stationId)
    {
        return Cache::remember('nearbyStations-{$stationId}', now()->addDays(10), function () use ($stationId) {
            return $this->calculateNearbyStations($stationId);
        });


    }

    private function calculateNearbyStations($stationId)
    {
        $stations = $this->getStationInfo();
        $fromStation = $stations[$stationId];

        return $stations->filter(function ($station) use ($fromStation) {
            if($station['id'] == $fromStation['id']){
                return false;
            }
            $distance = $this->calculateDistance($fromStation, $station);
            return $distance < 300;
        });
    }

    private function calculateDistance(mixed $station1, mixed $station2)
    {
        $lat1 = $station1['location']['lat'];
        $lon1 = $station1['location']['lon'];
        $lat2 = $station2['location']['lat'];
        $lon2 = $station2['location']['lon'];
       return $this->haversineGreatCircleDistance($lat1, $lon1, $lat2, $lon2);
    }

    function haversineGreatCircleDistance(
        $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }
}
