<?php

namespace App\Http\Controllers;

use App\Services\BikeApiService;

class StationController extends Controller
{
    protected $bikeStationService;

    public function __construct(BikeApiService $bikeStationService)
    {
        $this->bikeStationService = $bikeStationService;
    }
    public function show($stationId)
    {
        // TODO refactor this to use the service and Station model
        $stationInfo = $this->bikeStationService->getStationInfo();
        $stationStatus = $this->bikeStationService->getStationStatus();
        $nearbyStations = $this->bikeStationService->getNearbyStations($stationId);

        return view('station', [
            'stationInfo' => $stationInfo[$stationId],
            'stationsInfo' => $stationInfo,
            'stationStatus' => $stationStatus[$stationId],
            'nearbyStations' => $nearbyStations,
        ]);
    }
}
