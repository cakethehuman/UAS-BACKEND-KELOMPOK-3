@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Edit Game
        </h1>
    </div>
    <div class="flex items-center justify-center">
        <div class="border border-5 border-mavs-navy px-2 py-2 w-5xl rounded-xl">
            <form method="POST" action="{{ route('games.update', $game) }}">
                @csrf @method('PUT')
                <div class="flex flex-col gap-3">
                    <h1 class="text-white">Home Team Id</h1>
                    <input name="home_team_id" 
                    type = "text"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $game->home_team_id }}">

                    <h1 class="text-white">Away Team Id</h1>
                    <input name="away_team_id" 
                    type = "text"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $game->away_team_id }}">

                    <h1 class="text-white">New Date</h1>
                    <input name="scheduled_date" 
                    type = "datetime-local"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $game->scheduled_date }}">

                    <h1 class="text-white">Scheduled</h1>
                    <input name="game_status" 
                    type = "text"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $game->game_status }}">


                    <button type="submit" class="bg-green-700 text-white h-xs rounded-full">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection