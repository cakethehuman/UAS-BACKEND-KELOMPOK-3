@extends('layouts.app')

@section('content') 
    <div class="flex items-center justify-center">          
        <h1 class="text-white font-bold text-3xl w-70 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-2 shadow-lg shadow-mavs-navy">
            Tickets 
        </h1>	
    </div> 

    <div class="flex flex-col items-center justify-center p-2 gap-20"> 
	    <h2 class="text-white font-bold text-2xl w-3xl h-15 text-center 
			border-2 bg-gray-800 border-mavs-navy rounded-full 
			shadow-lg shadow-mavs-navy py-2 m-1 
			"

		    >Choose your game
	    </h2>		
	    <div class="flex flex-row items-center justify-center p-6 border-2 border-mavs-navy bg-gray-800 w-4xl min-h-48 text-white font-bold rounded-4xl shadow-lg shadow-gray-700 gap-4">
		    @if (!$teams)
			    <h1 class="text-white font-bold text-2xl"> 
				    Sorry, no team available, please add the teams first! 
			    </h1> 
		    @else	
			<form method="POST" action="" class="flex flex-col items-center justify-center"> 
				@csrf
				<div class="flex items-center justify-center gap-6 mt-5">
					
					<label for="months">Choose the month:</label>	
					<select name="months" class="border border-gray-700 bg-mavs-navy rounded-3xl w-32 px-3 py-1 text-center layout-fix">
						@foreach ($months as $month)
							<option value="{{ $month }}">{{ $month }}</option> 
						@endforeach 
					</select>
						
					<label for="teams">Choose a team:</label>
					<select name="game" class="border border-gray-700 bg-mavs-navy rounded-3xl w-64 px-3 py-1 text-center"> 
						@foreach ($teams as $team)
		    				   <option value="{{ $team->name }}">{{ $team->name }}</option> 
		    		  		@endforeach 
		   			</select>
				</div>	 
						
				<input type="submit" value="Find your ticket!" class="flex bg-blue-900 hover:bg-blue-800 text-white font-bold rounded-full transition-all w-48 h-10 mt-2 shadow-md">
			</form> 
		    @endif 
	    </div> 
	     
    </div>       
    

@endsection
