@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-70 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-2 shadow-lg shadow-mavs-navy">
            Players Info
        </h1>
    </div>
    <div class="flex flex-col items-center justify-center 
    border border-3 border-xs border-mavs-navy py-5 my-3">
        <img class = "w-70 h-50 items-center" src="{{ asset($player->pfp) }}">
        <h1 class="text-white">Player Id : {{ $player->id }}</h1>
        <h1 class="text-white">Name: {{ $player->name }}</h1>
        <h1 class="text-white">Team: {{ $player->team }}</h1>
        <h1 class="text-white">Role: {{ $player->role }}</h1>
        <h1 class="text-white">Age: {{ $player->age }}</h1>
        <h1 class="text-white">Height: {{ $player->height }}</h1>
        <h1 class="text-white">Weight: {{ $player->weight }}</h1>
        <h1 class="text-white">Yearspro: {{ $player->yearspro }}</h1>
        <h1 class="text-white">Country: {{ $player->country }}</h1>
        <a class="bg-green-500 px-5 rounded-full" 
        href="{{ route('players.index') }}">Kembali</a>
    </div>
@endsection