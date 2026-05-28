<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
class AuthController extends Controller
{
	// naming convention akan berbeda dengan handling resource
	public function showRegister()
	{
		// Me-redirect ke view/auth/register.blade.php
		return view('auth.register');	
	}

	public function showLogin()
	{
		// Me-redirect ke view/auth/login.blade.php
		return view('auth.login');	
	}	

	public function register(Request $request)
	{	
		// memvalidasi input untuk register		
		$validated = $request->validate([
			// Validasi akan dilakukan otomatis oleh laravel dengan syntax yang ada dibawah ini
			'name' => 'required|string|max:255',
			'email' => 'required|email|unique:users',	
			'password' => 'required|string|min:8|confirmed' // confirmed bisa bekerja dengan cara melihat sebuah entry password yang kedua kali dengan name="password_confirmation"
		]);		
		// membuat user baru setelah tervalidasi
		$user = User::create($validated);

		Auth::login($user);

		return view('Home');
	}

	public function login(Request $request)
	{
		$validated = $request->validate([
			// Validasi akan dilakukan otomatis oleh laravel dengan syntax yang ada dibawah ini
			'email' => 'required|email|',	
			'password' => 'required|string|' 
		]);
		
		if (Auth::attempt($validated)) {
			$request->session()->regenerate();

			return view("Home"); 
		}		

		throw ValidationException::withMessages([
			'credentials' => 'Sorry, incorrect credentials'	
		]);
	}	

	public function logout(Request $request)
	{
		// melakukan proses logout
		Auth::logout();		

		// menghapus semua data yang berhubungan dengan user yang log out 
		$request->session()->invalidate();
		// untuk double check @csrf
		$request->session()->regenerateToken();	

		return redirect()->route('show.login');
	}
}
