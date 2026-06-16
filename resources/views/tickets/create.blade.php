@extends('layouts.app')

@section('content')
	<div class="flex items-center justify-center">          
           <h1 class="text-white font-bold text-3xl w-70 h-15 py-2 text-center 
               border-2 bg-gray-800 border-mavs-navy rounded-full m-2 shadow-lg shadow-mavs-navy">
               Create Tickets 
           </h1>	
        </div>	
	<div>	
		<form action="{{ route('tickets.store') }}" method="POST"> 
			@csrf
			<label for="">

			</label>
		</form>
	</div>
@endsection
