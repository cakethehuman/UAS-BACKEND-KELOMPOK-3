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

		    >Choose the game 
	    </h2>		
	    
	    @if (blank($games))
		    <div class="grid grid-cols-1 gap-x-[15rem] items-center justify-center p-6 border-2 border-mavs-navy bg-gray-800 w-4xl min-h-48 text-white font-bold rounded-4xl shadow-lg shadow-gray-700 gap-4">
			    <h1 class="flex flex-col items-center justify-center text-white font-bold text-2xl text-center"> 
				    Sorry, no game available! 
				    <br>
				    <a href="{{ route('tickets.index') }}" class="flex justify-center items-center text-2xl bg-blue-700 border border-mavs-navy text-white font-bold rounded-4xl hover:bg-green-500 transition-all w-68 h-10">Back to tickets page</a>
			    </h1> 
		    </div>
	    @else	
	    <div class="grid grid-cols-2 gap-x-[15rem] items-center justify-center p-6 border-2 border-mavs-navy bg-gray-800 w-4xl min-h-48 text-white font-bold rounded-4xl shadow-lg shadow-gray-700 gap-4">				
			@foreach ($games as $game)
				<span class="flex flex-col text-white font-bold
					     text-[15px] text-center p-6 m-8 w-96 h-32
					     bg-gray-800 border-mavs-navy rounded-full
					     shadow-lg shadow-mavs-navy justify-center items-center
					     ">{{ $game->homeTeam->name }} vs {{ $game->awayTeam->name }}</span>	
				<a href="{{ route('tickets.game', $game) }} " class="flex justify-center items-center w-48 h-10 text-white font-bold rounded-2xl bg-blue-700/30 border border-yellow-500/60 hover:bg-green-700/70 hover:border-white text-center transition-all shadow-lg shadow-gray-700 hover:shadow-mavs-blue-700">Select this game</a>
			@endforeach	
			 
	    </div>
	    <a href="{{ route('tickets.index') }}" class="flex justify-center items-center text-2xl bg-blue-800 border border-mavs-navy text-white font-bold rounded-full transition-all w-64 h-10 shadow-lg shadow-white hover:shadow-amber-600 hover:text-green-700 hover:bg-amber-200">Back to tickets page</a>
	    @endif 
	             
	     
    </div>       
    

@endsection
