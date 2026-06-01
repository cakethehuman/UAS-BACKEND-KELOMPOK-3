@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Games
        </h1>
    </div>
    <section id="teams" class="flex justify-center">
        <div class="flex justify-center border border-mavs-navy border-3 shadow-md shadow-mavs-navy rounded-lg w-5xl my-3">
            <div class="grid grid-cols-5 gap-25 px-8 py-8">
                @if($games -> isEmpty())
                    <p class="text-white">No games</p>
                @else
                    @foreach($games as $game)
                        <div class="text-white border border-3 border-mavs-navy w-xl rounded-lg">
                            <h1>{{ $game -> home_team_id }}</h1>
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