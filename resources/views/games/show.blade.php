@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-2 shadow-lg shadow-mavs-navy">
            Game Info
        </h1>
    </div>
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
                    src={{ asset($game->AwayTeam->logo) }} 
                    alt="AwayTeamLogo">
                    <h1 class="text-xl">{{ $game->awayTeam->name }}</h1>
                </div>  
        </div>
        <h1 class="flex items-center justify-center">Game Status : {{ $game->game_status }}</h1>
        <div class="flex items-center justify-center">
            <div class="flex border border-3 border-mavs-navy 
            items-center justify-center w-lg h-50 rounded-lg">
                <div class="grid grid-cols-10 gap-2">
                    @foreach($game->seats as $seat)
                        <div class="flex border border-3 border-mavs-navy items-center justify-center w-10 h-10">
                            <a href="{{ route('seats.show', [$game,$seat]) }}">{{ $seat->seat_number }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center m-3">
            <a class="text-white border border-2 
            border-green-600 rounded-full 
            h-7 px-5 bg-green-600" 
            href="{{ route('seats.create', $game->id) }}"> + Buat Post Baru</a>
        </div>
    </div>
@endsection