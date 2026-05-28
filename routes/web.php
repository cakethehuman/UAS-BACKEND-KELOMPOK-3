<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeamController;

use App\Http\Controllers\ArticleController;

use App\Http\Controllers\StoreController;

Route::get('/', function () {
    return view('Home');
});

// Untuk teams page
Route::resource('teams', TeamController::class);

// Untuk news page
Route::resource('news', ArticleController::class)->parameters(['news' => 'slug']);

//Untuk store page
Route::resource('store', StoreController::class);