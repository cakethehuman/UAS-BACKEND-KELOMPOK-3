<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeamController;

use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('Home');
});

// Untuk teams page
Route::resource('teams', TeamController::class);

// Untuk news page
Route::resource('news', ArticleController::class)->parameters(['news' => 'slug']);