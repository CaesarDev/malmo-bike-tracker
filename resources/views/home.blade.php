@extends('layouts.app')
@section('title',  "MalmÖ Bike Tracker")
@section('content')
<div class="container mx-auto py-8 max-w-[1200px]">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Repeat this block for each bike station -->
        @foreach($stationStatus as $station)
            <div class="{{ $station['availability']['bikes'] > 5 ? 'bg-white' : 'bg-red-100' }} p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <img src="{{ asset('images/stations/011.png') }}" alt="Station Image" class="w-full h-42 object-cover rounded-md mb-4">
                <h2 class="text-xl font-bold text-gray-800 mb-2 underline">
                    <a href="/station/{{ $station['id'] }}">
                        {{ $station['id'] }}
                        {{ $stationInfo[$station['id']]['name'] }}
                    </a>
                </h2>
                <p class="text-gray-600">
                    Available Bikes:
                    <span class="font-bold {{ $station['availability']['bikes'] > 5 ? 'text-green-500' : 'text-red-500' }}">
                        {{ $station['availability']['bikes'] }}
                    </span>
                    <br>
                    Available Slots:
                    <span class="font-bold">{{ $station['availability']['slots'] }}</span>
                </p>
            </div>
        @endforeach
        <!-- End of block -->
    </div>
</div>
@endsection
