@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-2 shadow-lg shadow-mavs-navy">
            Game Info
        </h1>
    </div>
    @if ($errors->has('ticket_already_booked'))
	<div class="flex justify-center my-3">
		<div class="flex justify-center text-center items-center bg-white text-red-700 rounded-3xl w-64 h-10">
    			{{ $errors->first('ticket_already_booked') }}	
    		</div>	
	</div>
    		 
    @endif 
    <div class="text-white border border-3 border-mavs-navy rounded-lg m-2">
        <div class="flex flex-row justify-center items-center gap-25 my-5 mx-5">
            <div class="flex flex-col items-center justify-center">
                <img 
                    class = "w-50 h-50 object-contain items-center"
                    src={{ asset($game->homeTeam->logo) }}
                    alt="HomeTeamLogo">
                    <h1 class="text-xl">{{ $game->homeTeam->name }}</h1>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <h1 class="text-xl">{{ $game->scheduled_date->format('D d M') }}</h1>
                    <h1 class="text-xl">{{ $game->scheduled_date->format('H:i') }}</h1>
                    <h1 class="text-xl">{{ $game->awayTeam->arena }}</h1>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <img  
                    class = "w-50 h-50 object-contain items-center"
                    src={{ asset($game->awayTeam->logo) }} 
                    alt="AwayTeamLogo">
                    <h1 class="text-xl">{{ $game->awayTeam->name }}</h1>
                </div>  
        </div>
        <h1 class="flex items-center justify-center">Game Status : {{ $game->game_status }}</h1>
        <div class="flex items-center justify-center">
            <div class="flex border border-3 border-mavs-navy 
            items-center justify-center w-lg h-auto rounded-lg">
                <div class="grid grid-cols-10 gap-2 my-5">
                    @foreach($game->seats as $seat)
			@if ($seat->seat_availability !== "Available")
		          <div class="flex border border-3 border-red-800 items-center justify-center w-10 h-10">
                            {{ $seat->seat_number }}
                          </div>			
			@else
		           <div class="flex border border-3 border-mavs-navy items-center justify-center w-10 h-10 hover:border-blue-700">
                            <a href="{{ route('tickets.game.seat', [$game,$seat]) }}">{{ $seat->seat_number }}</a>
                           </div>	
			@endif
                        
                    @endforeach
                </div>
            </div> 
        </div>
	<div class="flex justify-center my-5">
		<a href="{{ route('tickets.index') }}" class="bg-[#00E676] w-96 h-10 text-[#121212] font-semibold rounded-4xl text-2xl text-center shadow-lg shadow-[0_4px_14px_rgba(0, 0, 0, 0, 4)] transition-all duration-300 ease-in-out hover:shadow-gray-600 hover:translate-y-0.5 hover:bg-mavs-navy hover:text-white">Go back to tickets page</a>
	</div>
	
	
@endsection
