@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Games
        </h1>
    </div>
    <section id="teams" class="flex justify-center">
        <div class="flex flex-row items-center justify-center border border-mavs-navy border-3 shadow-md shadow-mavs-navy rounded-lg w-6xl my-3">
            <div class="grid grid-cols-2 gap-5 px-8 py-8">
                @if($games -> isEmpty())
                    <p class="text-white">No games</p>
                @else
                    @foreach($games as $game)
                        <div class="text-white border border-3 border-mavs-navy rounded-lg hover:border-blue-700">
                            <div class="flex flex-row justify-center items-center gap-3 my-5 mx-5">
                                <div class="flex flex-col items-center justify-center">
                                    <img 
                                    class = "w-20 h-20 object-contain items-center"
                                    src={{ asset($game->homeTeam->logo) }} 
                                    alt="HomeTeamLogo">
                                    <h1>{{ $game->homeTeam->name }}</h1>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <h1>{{ $game->scheduled_date->format('D d M') }}</h1>
                                    <h1>{{ $game->scheduled_date->format('H:i') }}</h1>
                                    <h1>{{ $game->awayTeam->arena }}</h1>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <img  
                                    class = "w-20 h-20 object-contain items-center"
                                    src={{ asset($game->AwayTeam->logo) }} 
                                    alt="AwayTeamLogo">
                                    <h1>{{ $game->awayTeam->name }}</h1>
                                </div>
                            </div>
                            <div class="flex flex-row justify-center items-center gap-2 py-2">
                                <a class="bg-blue-700 
                                rounded-full w-7 h-5 text-white text-xs flex items-center 
                                justify-center" href="{{ route('games.show', $game) }}">🔍</a>
                                <a class="bg-yellow-500 
                                rounded-full w-7 h-5 text-white text-xs flex items-center 
                                justify-center" href="{{ route('games.edit', $game) }}">📝</a>
                                <form action="{{ route('games.destroy', $game) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class='bg-red-700 rounded-full w-7 h-5 text-white text-xs 
                                    flex items-center justify-center' type="submit">X</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <section id="Edit" class="flex justify-center">
        <div class="flex w-5xl items-center justify-center">
            <a class="text-white border border-2 border-green-600 rounded-full h-7 px-5 bg-green-600" href="{{ route('games.create') }}"> + Buat Post Baru</a>
        </div>
    </section>
@endsection