<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeamController;

Route::get('/', function () {
    return view('Home');
});

// Untuk teams page
Route::resource('teams', TeamController::class);