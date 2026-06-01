@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-55 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Create Games
        </h1>
    </div>
    <section id="form">
        <div class="flex items-center justify-center">
            <div class="border border-5 border-mavs-navy px-2 py-2 w-5xl rounded-xl">
                <form method = 'POST' action="{{ route('games.store') }}">
                    @csrf
                    <div class="flex flex-col gap-3">
                        <h1 class="text-white">Home team id</h1>
                        <input class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="home_team_id" type="number" required>

                        <h1 class="text-white">Away team id</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="away_team_id" type="number" required>

                        <h1 class="text-white">scheduled date</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="scheduled_date" type="date" required>

                        <label class="text-white" for="game_status">game status : </label>
                        <select class="border border-mavs-navy bg-white rounded-full pl-4" name="game_status" id="game_status">
                            <option value="Scheduled">scheduled</option>
                            <option value="Delayed">Delayed</option>
                            <option value="Pending">Pending</option>
                        </select>

                        <button class = 'text-white bg-green-700 rounded-full' type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection