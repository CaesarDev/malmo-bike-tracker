<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;

Route::get('/', Homecontroller::class);

Route::get('station/{station}', [StationController::class, 'show']);

Route::get('q/{station}', [StationController::class, 'quicklook']);

Route::get('gandalf', [AdminController::class, 'index']);
