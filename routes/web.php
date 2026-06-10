<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SeaController;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentsController;

use App\Http\Controllers\StoreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SeatController;

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('Home');
});

// Untuk register
Route::middleware('guest')->controller(AuthController::class)->group(function (){
	Route::get('/register', 'showRegister' )->name('show.register'); // memanggil fungsi showRegister, dan showLogin pada AuthController
	Route::get('/login', 'showLogin')->name('show.login'); // Menampilkan

	// Untuk post
	Route::post('/register', 'register')->name('register');
	Route::post('/login', 'login')->name('login');

});
Route::middleware('auth')->group(function (){	
	Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
	// Untuk teams page
	Route::resource('teams', TeamController::class)->middleware('auth');
  
	// Games
  	Route::resource('games', GameController::class)->middleware('auth');
	Route::resource('games.seats', SeatController::class)->only(['create', 'store', 'show']);
    Route::resource('seats', SeatController::class)->only(['edit', 'destroy', 'update']);

	// Untuk news page
	Route::resource('news', ArticleController::class)->parameters(['news' => 'slug']);
	Route::resource('comments', CommentsController::class)->parameters(['comments' => 'comments']);

  	//Untuk store page
  	Route::resource('store', StoreController::class);

	//Untuk mengedit profile 
	Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile/update-name', [UserController::class, 'updateName'])->name('profile.updateName');
	Route::patch('/profile/update-email', [UserController::class, 'updateEmail'])->name('profile.updateEmail');
	Route::patch('/profile/update-password', [UserController::class, 'updatePw'])->name('profile.updatePass');

  //Untuk menghapus account
	Route::get('/profile/delete', [UserController::class, 'delete'])->name('profile.delete');
	Route::delete('/profile/delete', [UserController::class, 'destroy'])->name('profile.destroy');
	
	Route::resource('profile', UserController::class);
    
  // untuk store page
  	Route::resource('store', StoreController::class);
});








