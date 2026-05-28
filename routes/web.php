<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('Home');
});

// Untuk teams page
Route::resource('teams', TeamController::class);
// game
Route::resource('games', GameController::class);