<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;

Route::get('/', Homecontroller::class);

Route::get('station/{station}', [StationController::class, 'show']);
