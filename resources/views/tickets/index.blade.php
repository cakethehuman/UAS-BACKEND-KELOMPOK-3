@extends('layouts.app')

@section('content') 
    <div class="flex items-center justify-center">          
        <h1 class="text-white font-bold text-3xl w-70 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-2 shadow-lg shadow-mavs-navy">
            Tickets 
        </h1>	
    </div>

    <div class="flex items-center justify-center m-5">
	   
	   <a href="{{ route('tickets.create') }}" 
		   class="flex items-center justify-center bg-amber-500 rounded-3xl w-56 h-12 
		          text-blue-950 text-shadow-white-500 font-bold text-lg 
			  transition-all duration-300 ease-in-out 
			  hover:bg-blue-950 hover:text-white hover:scale-[1.07] 
			  dark:bg-blue-950 dark:text-amber-400 dark:hover:bg-amber-500 dark:hover:text-blue-950" >
		   <span>+ Create new ticket</span>
	   </a>	
	   
    </div>	

   
    <div class="flex item-center justify-center p-2"> 
	    @if (!$data)
		 <h3 class="text-white font-bold text-2xl p-4">Tidak ada tiket.</h3> 	 	 
	    @else
	   	<div class="flex flex-col items-center justify-center">
	    	  @foreach ($games as $game)
	    	  	<span class="flex flex-col text-white font-bold text-2xl text-center p-1 m-8 w-30 h-12 bg-gray-800 border-mavs-navy rounded-full shadow-lg shadow-mavs-navy">
				Game {{ $game->id }} 	
		  	</span>	
			<div class="grid grid-cols-10 gap-1 p-4 items-center justify-center">
				@foreach ($game->seats as $seat)
					@if ($seat->seat_availability !== 'Available')
						<div class="flex items-center justify-center text-white font-bold border-3 py-3 border-red-600 w-10 h-10">{{ $seat->seat_number }}</div>	
					@else
						<div class="flex items-center justify-center text-white font-bold border-3 py-3 border-mavs-navy w-10 h-10 hover:border-blue-700">{{ $seat->seat_number }}</div>	
					@endif
						
			 	@endforeach		
			</div>
			 

	    	  @endforeach
		</div> 
	    @endif   
    </div>       
    

@endsection
