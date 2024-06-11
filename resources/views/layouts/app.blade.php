<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="45">
    <title>@yield('title')  </title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body class="bg-gray-100 min-h-screen pb-12">
    <a href="/">
        <img src="{{ asset('images/malmo-bike-tracker.png') }}" alt="Malmö Bike Tracker Logo"
             class="block mx-auto max-w-[450px]">
    </a>
    @yield('content')
    <footer class="text-center pt-4">
        This is a service developed by <a class="underline" href="://caesardev.se">Caesar</a> in Malmö <3
    </footer>
</body>
</html>
