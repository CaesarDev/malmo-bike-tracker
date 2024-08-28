@extends('layouts.app')
@section('title',  "Malmö Bike Tracker")
@section('content')
<div class="container mx-auto py-8 max-w-[1200px]">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Repeat this block for each bike station -->
        @foreach($stations as $station)
            <div class="{{ $station->available_bikes > 5 ? 'bg-white' : 'bg-red-100' }} p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                @if($station->hasStationImage)
                    <img src="{{ asset("images/stations/$station->id.jpg") }}" alt="Station Image" class="w-full h-40 object-cover rounded-md mb-4">
                @else
                    <img src="{{ asset("images/stations/default.jpg") }}" alt="Default Station Image" class="opacity-70 w-full h-40 object-cover rounded-md mb-4">
                @endif
                <h2 class="text-xl font-bold text-gray-800 mb-2 underline">
                    <a href="/station/{{ $station->id }}">
                        {{ $station->id }}
                    </a>
                </h2>
                <p class="text-gray-600">
                    Available Bikes:
                    <span class="font-bold {{ $station->available_bikes > 5 ? 'text-green-500' : 'text-red-500' }}">
                        {{ $station->available_bikes }}
                    </span>
                    <br>
                    Available Slots:
                    <span class="font-bold">{{ $station->slots }}</span>
                </p>
            </div>

        @endforeach
        <!-- End of block -->
    </div>
</div>
@endsection
