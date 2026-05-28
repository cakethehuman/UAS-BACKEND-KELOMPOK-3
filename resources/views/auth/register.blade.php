@extends('layouts.app');

@section("content")
	<h2 class="text-red-700 bold italic mb-2">Register</h2>
	<form action="{{ route('register') }}" method="POST">	
		@csrf
		<label for="name" class="text-white">Name:</label>
		<br>	
		
		<input
		  type="text"
		  name="name"
		  required
		  value="{{ old('name') }}"
		  placeholder="Enter your name" 
		  class="px-2 py-1 rounded-sm border border-cyan-700 text-white"		  
		>
		<br>		
		<label for="email" class="text-white">Email:</label>
		<br>
		<input
		  type="email"
		  name="email"
		  required
		  value="{{ old('email') }}"
	   	  placeholder="Enter your email" 
		  class="px-2 py-1 rounded-sm border border-cyan-700 text-white"		  
		>
		<br>
		<label for="password" class="text-white">Password:</label>
		<br>
		<input
		  type="password"
		  name="password"
		  required
	 	  placeholder="Enter your password" 
		  class="px-2 py-1 rounded-sm border border-cyan-700 text-white"		  
		>
		<br>
		<label for="password_confirmation" class="text-white">Confrim password:</label>
		<br>
		<input
		  type="password"
		  name="password_confirmation"
		  required
	 	  placeholder="Reenter your password" 
		  class="px-2 py-1 rounded-sm border border-cyan-700 text-white"		  

		>
		<br>
		<button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded mt-4 hover:bg-amber-600 transition duration-200 ease-in-out delay-150">Register</button>

		<!-- validation errors -->
		@if ($errors->any())
			<ul>
				   @foreach ($errors->all() as $error)
					   <li class="my-2 text-red-500">{{ $error }}</li>
				   @endforeach
			</ul>
		@endif

	</form>
@endsection

