<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StandingsController;

Route::get('/', function () {
    return view('Home');
});

Route::get('/standings', [StandingsController::class, 'index']);