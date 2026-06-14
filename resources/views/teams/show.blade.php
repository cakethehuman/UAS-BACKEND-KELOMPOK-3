@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Team Info
        </h1>
    </div>
    <div class="flex flex-col items-center justify-center 
    border border-3 border-xs border-mavs-navy py-5">
        <img 
        class = "w-50 h-50 items-center"
        src={{ asset($team -> logo) }}>
        <h1 class="text-white">team id : {{ $team->id }}</h1>
        <h1 class="text-white">{{ $team->name }} / {{ $team->abbreviation }}</h1>
        <h1 class="text-white">Location   : {{ $team->city }}</h1>
        <h1 class="text-white">Conference : {{ $team->conference }}</h1>
        <h1 class="text-white">Division   : {{ $team->division }}</h1>
        <h1 class="text-white">Arena   : {{ $team->arena }}</h1>
        <div class="flex flex-row gap-2">
            <h1 class="text-green-400">wins : {{ $team->wins }}</h1>
            <h1 class="text-red-400">losses : {{ $team->losses }}</h1>
        </div>
        <a class="bg-green-500 px-5 rounded-full" 
        href="{{ route('teams.index') }}">Kembali</a>
    </div>
@endsection