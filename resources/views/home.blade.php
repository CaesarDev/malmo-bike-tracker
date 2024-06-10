<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malmö Bike Tracker</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200 font-sans">

<div class="container mx-auto py-8 max-w-[1200px]">
    <h1 class="text-4xl text-center font-extrabold text-gray-900 mb-12">Malmö Bike Tracker</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Repeat this block for each bike station -->
        @foreach($stationStatus as $station)
            <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <img src="https://loremflickr.com/320/240" alt="Station Image" class="w-full h-20 object-cover rounded-md mb-4">
                <h2 class="text-xl font-bold text-gray-800 mb-2">
                    {{ $station['id'] }}
                    {{ $stationInfo[$station['id']]['name'] }}
                </h2>
                <p class="text-gray-600">
                    Available Bikes:
                    <span class="font-bold text-green-500">{{ $station['availability']['bikes'] }}</span>
                    <br>
                    Available Slots:
                    <span class="font-bold">{{ $station['availability']['slots'] }}</span>
                </p>
            </div>
        @endforeach
        <!-- End of block -->
    </div>
</div>

</body>
</html>
