<div class="px-6 py-4 w-full max-w-md rounded overflow-hidden shadow-lg bg-white">
    <div class="">
        <div class="font-bold text-xl mb-2">{{ $stationInfo['id'] }} {{ $stationInfo['name'] }}</div>
        @if($stationStatus['availability']['bikes'] > 5)
            <span
                class="inline-block bg-green-200 rounded-full px-3 py-1 text-sm font-semibold text-green-700 mr-2 mb-2">Plenty bikes</span>
        @else
            <span
                class="inline-block bg-red-200 rounded-full px-3 py-1 text-sm font-semibold text-red-700 mr-2 mb-2">Few bikes</span>
        @endif
        <p class="text-gray-700 text-base">
            <span class="font-semibold">Address:</span> {{ $stationInfo['address'] }}
        </p>
        <p class="text-gray-700 text-base">
            <span class="font-semibold">Available Bikes:</span> {{ $stationStatus['availability']['bikes'] }}
        </p>
        <p class="text-gray-700 text-base">
            <span class="font-semibold">Available Slots:</span> {{ $stationStatus['availability']['slots'] }}
        </p>
        <p class="text-gray-700 text-base">
                <span
                    class="font-semibold">Total Slots:</span> {{ $stationStatus['availability']['bikes'] + $stationStatus['availability']['slots'] }}
        </p>
        <p class="text-gray-700 text-base">
            <span class="font-semibold">Location:</span> {{ $stationInfo['location']['lat'] }}
            , {{ $stationInfo['location']['lon'] }}
        </p>
        <div id="mapid" class="h-[200px] mt-4"></div>
        <script>
            var stationLocation = [{{ $stationInfo['location']['lat'] }}, {{ $stationInfo['location']['lon'] }}];
            var map = L.map('mapid').setView(stationLocation, 16);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);
            L.marker(stationLocation).addTo(map);
        </script>
    </div>
    <div class="pt-4 pb-2 opacity-70">
        <x-pill color="{{ $stationStatus['statusDetail']['calendarStatus'] == 'Open' ? 'blue' : 'red' }}">
            {{ $stationStatus['statusDetail']['calendarStatus'] }}
        </x-pill>
        <x-pill
            color="{{ $stationStatus['statusDetail']['operationalStatus'] == 'Operational' ? 'green' : 'red' }}">
            {{ $stationStatus['statusDetail']['operationalStatus'] }}
        </x-pill>
        <x-pill color="{{ $stationStatus['statusDetail']['connectivityStatus'] == 'Connected' ? 'green' : 'red' }}">
            {{ $stationStatus['statusDetail']['connectivityStatus'] }}
        </x-pill>
    </div>
    <div>
        <h3 class="font-bold">Nearby stations (300m)</h3>
        <ul class="text-gray-700 text-base flex space-y-1 flex-col">
            @foreach($nearbyStations as $nearbyStation)
                <li>
                    <a href="/station/{{ $nearbyStation['id'] }}" class="underline">
                        {{ $nearbyStation['id'] }} - {{ $stationsInfo[$nearbyStation['id']]['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
