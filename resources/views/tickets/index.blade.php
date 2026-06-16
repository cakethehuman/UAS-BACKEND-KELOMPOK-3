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
	   	<ul class="flex flex-col items-center justify-center">
	    	  @foreach ($data as $item)
	    	  	<li class="text-white font-bold text-2xl text-center p-1 m-2 w-30 h-12 bg-gray-800 border-mavs-navy rounded-full shadow-lg shadow-mavs-navy">
	    	  		{{ $item }}
		  	</li>	
	    	  @endforeach
		</ul> 
	    @endif   
    </div>       
    

@endsection
