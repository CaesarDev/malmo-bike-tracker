@extends('layouts.app')
@section('title',  "{$stationStatus['availability']['bikes']} - {$stationInfo['name']}")
@section('content')
<div class="flex flex-col items-center">
    <x-station-card-small :station :stationInfo="$stationInfo" :stationStatus="$stationStatus" :nearby-stations="$nearbyStations" :stations-info="$stationsInfo"/>
</div>
@endsection
