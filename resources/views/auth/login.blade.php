@extends('layouts.app');

@section("content")	
	<form action="{{ route('login') }}" method="POST">
		@csrf
		<h2 class="text-green-500 bold italic">Log In to Your Account</h2>
		<label for="email" class="text-white">Email:</label>
		<br>	
		<input
		  type="email"
		  name="email"
		  required
		  value= "{{ old('email') }}"
		  placeholder="Enter your email" 
		  class="px-2 py-1 rounded-sm border border-cyan-700 text-white"
		>
		<br>
		<!-- retain the value after submitted with old() -->
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
		<button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded mt-4 hover:bg-amber-600 transition duration-200 ease-in-out delay-150">Log in</button>
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

