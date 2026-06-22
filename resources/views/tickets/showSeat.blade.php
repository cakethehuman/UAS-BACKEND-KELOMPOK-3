@extends('layouts.app')

@section('content')	
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-65 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Seats
        </h1>
    </div>

    <div class = "flex justify-center">
        <div class="border border-3 border-mavs-navy rounded-lg w-3xl min-h-fit">
            <div class="flex flex-col items-center justify-center">
                <div class="flex text-white border border-3 border-mavs-navy justify-center w-150 mx-3 my-5">
                    <div class = "flex flex-row gap-5">
                        <div class="border border-3 border-red-500 m-5">
                            <img class = "w-55 h-55" 
                            src="{{ asset("images/other/seatImage.png") }}" 
                            alt="seatImage">
                        </div>
                        <div class="flex flex-col m-5 justify-center">
                            <h1> Price             : {{ $seat -> seat_price }}</h1>
                            <h1> Seat Number       : {{ $seat -> seat_number }}</h1>
                            <h1> Seat Availability : {{ $seat -> seat_availability }}</h1>
                        </div>

                    </div>
                </div>
                <div class="flex flex-row items-center justify-center mx-5">	
		   <form action="{{ route('tickets.book', [$game, $seat]) }}" method="POST">
			   @csrf
			   <button class="bg-green-400 rounded-full w-48 h-5 
					  text-white text-xs mx-2
					  flex items-center justify-center"
				   type="submit"	
					  >
				🎫
			   </button>	
		   </form> 
		   <a class="bg-white rounded-full w-48 h-5 text-white text-xs mx-2
				flex items-center justify-center" href="{{ route('tickets.game', $game) }}">⬅️</a>

                </div>
		
		
            </div>
        </div>
    </div>
@endsection

