<div class="px-6 py-4 w-full max-w-md rounded overflow-hidden shadow-lg bg-white">
    <div class="">
        <div class="font-bold text-xl mb-2">{{ $station->id }} {{ $station->name }}</div>
        @if($station->available_bikes > 5)
            <span
                class="inline-block bg-green-200 rounded-full px-3 py-1 text-sm font-semibold text-green-700 mr-2 mb-2">Plenty bikes</span>
        @else
            <span
                class="inline-block bg-red-200 rounded-full px-3 py-1 text-sm font-semibold text-red-700 mr-2 mb-2">Few bikes</span>
        @endif
        <p class="text-gray-700 text-base">
            <span class="font-semibold">Address:</span> {{ $station->address }}
        </p>
        <p class="text-gray-700 text-base">
            <span class="font-semibold">Available Bikes:</span> {{ $station->available_bikes }}
        </p>
        <p class="text-gray-700 text-base">
            <span class="font-semibold">Available Slots:</span> {{ $station->available_slots }}
        </p>
        <p class="text-gray-700 text-base">
                <span
                    class="font-semibold">Total Slots:</span> {{ $station->available_bikes + $station->available_slots }}
        </p>
        <p class="text-gray-700 text-base">
            <span class="font-semibold">Location:</span> {{ $station->location['lat'] }}
            , {{ $station->location['lon'] }}
        </p>
        <div id="mapid" class="h-[200px] mt-4"></div>
        <script>
            var stationLocation = [{{ $station->location['lat'] }}, {{ $station->location['lon'] }}];
            var map = L.map('mapid').setView(stationLocation, 16);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);
            L.marker(stationLocation).addTo(map);
        </script>
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
    <div>
        <h3 class="font-bold">Nearby stations (300m)</h3>
        <ul class="text-gray-700 text-base flex space-y-1 flex-col">
            @foreach($station->getNearbyStations() as $nearbyStation)
                <li>
                    <a href="/station/{{ $nearbyStation['id'] }}" class="underline">
                        {{ $nearbyStation['id'] }} - {{ $nearbyStation['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="pt-6">
        @if($station->hasStationImage)
            <img src="{{ asset("images/stations/$station->id.jpg") }}" alt="Station Image" class="w-full h-40 object-cover rounded-md mb-4">
        @else
            <svg class="w-12 mx-auto" viewBox="-26.42 0 98.85 98.85" xmlns="http://www.w3.org/2000/svg"><path fill="#DE9273" d="M21 57.85h4a3 3 0 0 1 3 3v35a3 3 0 0 1-3 3h-4a3 3 0 0 1-3-3v-35a3 3 0 0 1 3-3z"/><path fill="#F0C419" d="M6 31h34c3.312 0 6 2.687 6 6v33c0 3.312-2.688 6-6 6H6c-3.313 0-6-2.688-6-6V37a6 6 0 0 1 6-6z"/><path fill="#D1AB2B" d="M14 9c2.762 0 5 2.237 5 5v48c0 2.762-2.238 5-5 5s-5-2.238-5-5V14a5 5 0 0 1 5-5zm18 0c2.762 0 5 2.237 5 5v48c0 2.762-2.238 5-5 5s-5-2.238-5-5V14a5 5 0 0 1 5-5z"/><path fill="#E64B3C" d="M15 0h16c8.284 0 15 6.716 15 15v25H0V15C0 6.716 6.716 0 15 0z"/><path fill="#C94432" d="M37 40V14c0-2.763-2.238-5-5-5s-5 2.237-5 5v26h10zm-18 0V14c0-2.763-2.238-5-5-5s-5 2.237-5 5v26h10z"/><path fill="#C88368" d="M18 76h10L18 86V76z"/></svg>
            <strong>Sugen på en glass?</strong>
            Denna station saknar bild, skicka in en bild du tagit till info@caesardev.se så vi kan ladda upp den, som tack får
            du en glass skickad!
        @endif
    </div>
</div>
