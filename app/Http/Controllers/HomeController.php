<?php

namespace App\Http\Controllers;

use App\Services\BikeApiService;

class HomeController extends Controller
{
    protected $bikeStationService;

    public function __construct(BikeApiService $bikeStationService)
    {
        $this->bikeStationService = $bikeStationService;
    }

    public function __invoke()
    {
        return view('home', [
            'stations' => $this->bikeStationService->getStationModels(),
        ]);
    }
}
