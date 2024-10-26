@extends('layouts.app')
@section('title',  "{$station->available_bikes} cyklar lediga - {$station->name}")
@section('content')
    <div class="flex flex-col items-center">
        <div class="px-6 py-4 w-full max-w-md rounded overflow-hidden shadow-lg bg-white">
            <div class="">
                <div class="font-bold text-xl mb-2">
                    {{ $station->id }} {{ $station->name }}
                    @if($station->available_bikes > 5)
                        <span
                            class="inline-block bg-green-200 rounded-full px-3 py-1 text-sm font-semibold text-green-700 mr-2 mb-2">Plenty bikes</span>
                    @else
                        <span
                            class="inline-block bg-red-200 rounded-full px-3 py-1 text-sm font-semibold text-red-700 mr-2 mb-2">Few bikes</span>
                    @endif
                </div>
                <div class="{{ $station->availableBikesStatusTextColor }} font-semibold text-[75px] flex mb-6">
                    <div class="{{ $station->availableBikesStatusBgColor }} max-w-2xl rounded-xl px-4 mr-4">
                        <svg class="w-24 h-24 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                          <circle cx="18.5" cy="17.5" r="3.5"></circle>
                          <circle cx="5.5" cy="17.5" r="3.5"></circle>
                          <circle cx="15" cy="5" r="1"></circle>
                          <path d="M12 17.5V14l-3-3 4-3 2 3h2"></path>
                        </svg>
                    </div>
                    {{ $station->available_bikes }}
                </div>
                <div class="{{ $station->availableSlotsStatusTextColor }} font-semibold text-[75px] flex mb-6">
                    <div class="{{ $station->availableSlotsStatusBgColor }} max-w-2xl rounded-xl pt-2 px-4 mr-4">
                        <svg class="w-24 h-24 text-white" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 36 36" preserveAspectRatio="xMidYMid meet" stroke-width="" fill="currentColor">
                                <path class="clr-i-outline clr-i-outline-path-1" d="M18.09,20.59A2.41,2.41,0,0,0,17,25.14V28h2V25.23a2.41,2.41,0,0,0-.91-4.64Z"></path><path class="clr-i-outline clr-i-outline-path-2" d="M26,15V10.72a8.2,8.2,0,0,0-8-8.36,8.2,8.2,0,0,0-8,8.36V15H7V32a2,2,0,0,0,2,2H27a2,2,0,0,0,2-2V15ZM12,10.72a6.2,6.2,0,0,1,6-6.36,6.2,6.2,0,0,1,6,6.36V15H12ZM9,32V17H27V32Z"></path><rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect></svg>
                    </div>
                    {{ $station->slots ?? 0 }}
                </div>
            </div>
            <div class="pt-4 pb-2 opacity-70">
                <x-pill color="{{ $station->calendarStatus == 'Open' ? 'blue' : 'red' }}">
                    {{ $station->calendarStatus }}
                </x-pill>
                <x-pill
                    color="{{ $station->operationalStatus == 'Operational' ? 'green' : 'red' }}">
                    {{ $station->operationalStatus }}
                </x-pill>
                <x-pill color="{{ $station->connectivityStatus == 'Connected' ? 'green' : 'red' }}">
                    {{ $station->connectivityStatus }}
                </x-pill>
            </div>

        </div>

    </div>
@endsection
