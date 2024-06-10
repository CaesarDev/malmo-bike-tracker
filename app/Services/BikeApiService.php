<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class BikeApiService
{
    protected $client;

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

        return json_decode($content, true);
    }

    public function getStationInfo()
    {
        $content = Cache::remember('stations', now()->addDays(10), function () {
            $response = $this->client->request('GET', 'station');
            return $response->getBody()->getContents();
        });
        return collect(json_decode($content, true))->keyBy('id');
        //return json_decode($content, true);
    }
}
