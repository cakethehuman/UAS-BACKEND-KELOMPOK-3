<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeamController;

use App\Http\Controllers\ArticleController;

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('Home');
});

// Untuk teams page
Route::resource('teams', TeamController::class);

// Untuk news page
Route::resource('news', ArticleController::class)->parameters(['news' => 'slug']);

Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/update-name', [UserController::class, 'updateName'])->name('profile.updateName');
Route::patch('/profile/update-email', [UserController::class, 'updateEmail'])->name('profile.updateEmail');
Route::patch('/profile/update-password', [UserController::class, 'updatePw'])->name('profile.updatePass');


Route::get('/profile/delete', [UserController::class, 'delete'])->name('profile.delete');
Route::delete('/profile/delete', [UserController::class, 'destroy'])->name('profile.destroy');
Route::resource('profile', UserController::class);