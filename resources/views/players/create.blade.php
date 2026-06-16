@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Create Player
        </h1>
    </div>
    <section id="form">
        <div class="flex items-center justify-center">
            <div class="border border-5 border-mavs-navy px-2 py-2 w-5xl rounded-xl">
                <form method='POST' action="{{ route('players.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col gap-3">
                        <h1 class="text-white">Upload Photo</h1>
                        <input type="file" name="pfp" class='border border-mavs-navy bg-white rounded-full pl-4' accept="image/*">
                        @error('pfp')
                            <div class="text-red-500 text-sm">File format unsupported!</div>
                        @enderror

                        <h1 class="text-white">Name</h1>
                        <input class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="name" type="text" required>

                        <h1 class="text-white">Team</h1>
                        <select name="team" required class='border border-mavs-navy bg-white rounded-full pl-4'>
                            <option value="" disabled selected>Choose Team</option>
                            @foreach($teams as $team => $name)
                                <option value="{{ $name }}" >{{ $name }}</option>
                            @endforeach
                        </select>

                        <h1 class="text-white">Role</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="role" type="text" required>

                        <h1 class="text-white">Height</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="height" type="text" required>

                        <h1 class="text-white">Weight</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="weight" type="text" required>

                        <h1 class="text-white">Country</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="country" type="text" required>

                        <h1 class="text-white">Age</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="age" type="text" required>

                        <h1 class="text-white">Yearspro</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="yearspro" type="text" required>

                        <h1 class="text-white">Points</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="points" type="text" required>

                        <h1 class="text-white">Rebounds</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="rebounds" type="text" required>

                        <h1 class="text-white">Assists</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="assists" type="text" required>

                        <h1 class="text-white">Blocks</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="blocks" type="text" required>

                        <h1 class="text-white">Steals</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="steals" type="text" required>

                        <h1 class="text-white">Turnovers</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="turnovers" type="text" required>

                        <h1 class="text-white">Threepoints</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="threepoints" type="text" required>

                        <h1 class="text-white">Freethrows</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="freethrows" type="text" required>

                        <h1 class="text-white">Fantasy</h1>
                        <input 
                        class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="fantasy" type="text" required>

                        <button class = 'text-white bg-green-700 rounded-full' type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection