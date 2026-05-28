@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Create Games
        </h1>
    </div>
    <section id="form">
        <form method = 'POST' action="{{ route('games.store') }}">
            @csrf
            <div class="flex flex-col gap-5">
                <input class='border border-mavs-navy bg-white rounded-full' name="name" type="text" required>
                <input class='border border-mavs-navy bg-white rounded-full' name="city" type="text" required>
                <input class='border border-mavs-navy bg-white rounded-full' name="abbreviation" type="text" required>
                <input class='border border-mavs-navy bg-white rounded-full' name="logo" type="text" required>
                <button class = 'text-white' type="submit">Simpan</button>
            </div>
        </form>
    </section>
@endsection