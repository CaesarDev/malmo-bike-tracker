<div x-data="{show_subscription: false}">

    <div class="px-6 py-4 w-full max-w-96 rounded overflow-hidden shadow-lg bg-white">
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
                <span class="font-semibold">Available Slots:</span> {{ $station->slots ?? 0 }}
            </p>
            <div class="py-6">
                <button @click="show_subscription = true" x-show="!show_subscription" type="button" class="w-full focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>

                    Set up Alerts
                </button>
            </div>
            <div x-show="show_subscription" x-collapse>
                <livewire:create-subscription :station_id="$station->id" />
            </div>

            <div id="mapid" class="h-[200px] mt-4"></div>
            <p class="text-gray-700 text-base">
                <span class="font-semibold">Location:</span> {{ $station->location['lat'] }}
                , {{ $station->location['lon'] }}
            </p>
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
</div>
