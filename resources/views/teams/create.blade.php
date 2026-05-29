@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Create Team
        </h1>
    </div>
    <section id="form">
        <div class="flex items-center justify-center">
            <div class="border border-5 border-mavs-navy px-2 py-2 w-5xl rounded-xl">
                <form method = 'POST' action="{{ route('teams.store') }}">
                    @csrf
                    <div class="flex flex-col gap-3">
                        <h1 class="text-white">Name</h1>
                        <input class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="name" type="text" required>

                        <h1 class="text-white">City</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="city" type="text" required>

                        <h1 class="text-white">Abbreviation</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="abbreviation" type="text" required>

                        <h1 class="text-white">Logo</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="logo" type="text" required>

                        <h1 class="text-white">Conference</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="conference" type="text" required>

                        <h1 class="text-white">Division</h1>
                        <input class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="division" type="text" required>
                        
                        <h1 class="text-white">Wins</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="wins" type="number" required>

                        <h1 class="text-white">Losses</h1>
                        <input class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="losses" type="number" required>

                        <h1 class="text-white">Arena</h1>
                        <input class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="arena" type="text" required>

                        <button class = 'text-white bg-green-700 rounded-full' type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection