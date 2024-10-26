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
        $station = $this->bikeStationService->getSingleStation($stationId);

        return view('station', [
            'station' => $station,
        ]);
    }

    public function quicklook($stationId)
    {
        $station = $this->bikeStationService->getSingleStation($stationId);

        return view('quicklook', [
            'station' => $station,
        ]);
    }
}
