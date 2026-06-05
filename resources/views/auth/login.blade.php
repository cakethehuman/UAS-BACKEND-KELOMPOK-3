@extends('layouts.app')

@section("content")	
	<div class="flex justify-center items-center">          
        <h1 class="text-green-500 font-bold text-3xl w-100 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Log In to Your Account
        </h1>
    </div>
	<section class="flex items-center justify-center">
		<div class="flex border border-3 border-mavs-navy rounded-lg w-100 items-center justify-center">
			<form action="{{ route('login') }}" method="POST" class="my-10">
				@csrf
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
				<div class="flex items-center justify-center">
					<button 
					type="submit" 
					class="px-4 py-2 bg-blue-500 text-white rounded mt-4 
					hover:bg-amber-600 transition duration-200 ease-in-out delay-150">
					Log in</button>
				</div>
				<!-- validation errors -->
				@if ($errors->any())
					<ul>
						@foreach ($errors->all() as $error)
							<li class="my-2 text-red-500">{{ $error }}</li>
						@endforeach
					</ul>
				@endif
			</form>
		</div>
	</section>
@endsection

