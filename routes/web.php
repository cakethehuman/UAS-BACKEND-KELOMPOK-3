<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeamController;

use App\Http\Controllers\ArticleController;

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('Home');
});

// Untuk register
// memanggil fungsi showRegister, dan showLogin pada AuthController
// Menampilkan
Route::middleware('guest')->controller(AuthController::class)->group(function (){
	Route::get('/register', 'showRegister' )->name('show.register');
	Route::get('/login', 'showLogin')->name('show.login');

	// Untuk post
	Route::post('/register', 'register')->name('register');
	Route::post('/login', 'login')->name('login');

});
Route::middleware('auth')->group(function (){	
	Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
	// Untuk teams page
	// bisa seperti ini Route::resource('teams', TeamController::class)->middleware('auth'); tetapi harus satu satu
	Route::resource('teams', TeamController::class)->middleware('auth');
	// Untuk news page
	Route::resource('news', ArticleController::class)->parameters(['news' => 'slug']);
});






