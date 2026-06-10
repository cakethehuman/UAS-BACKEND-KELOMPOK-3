@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Edit Player
        </h1>
    </div>
    <div class="flex items-center justify-center">
        <div class="border border-5 border-mavs-navy px-2 py-2 w-5xl rounded-xl">
            <form method="POST" action="{{ route('players.update', $player) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="flex flex-col gap-3">
                    <h1 class="text-white">Change Photo</h1>
                    @if($player->pfp)
                        <div class="mb-2">
                            <img src="{{ asset($player->pfp) }}" alt="{{ $player->name }}" class="w-24 h-24 rounded-full object-cover">
                        </div>
                    @endif
                    <input type="file" name="pfp" class='border border-mavs-navy bg-white rounded-full pl-4' accept="image/*">
                        @error('pfp')
                            <div class="text-red-500 text-sm">File format unsupported!</div>
                        @enderror
                    <h1 class="text-white">Name</h1>
                    <input name="name" 
                    type="text"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->name }}">
   
                    <h1 class="text-white">Team</h1>
                    <select name="team" required class='border border-mavs-navy bg-white rounded-full pl-4'>
                        @foreach($teams as $name)
                            <option value="{{ $name }}" {{ old('team', $player->team) === $name ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>

                    <h1 class="text-white">Height</h1>
                    <input name="height" 
                    type="text"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->height }}">

                    <h1 class="text-white">Weight</h1>
                    <input name="weight" 
                    type="text"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->weight }}">

                    <h1 class="text-white">Country</h1>
                    <input name="country" 
                    type="text"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->country }}">

                    <h1 class="text-white">Age</h1>
                    <input name="age" 
                    type="number"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->age }}">

                    <h1 class="text-white">Yearspro</h1>
                    <input name="yearspro" 
                    type="text"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->yearspro }}">

                    <h1 class="text-white">Points</h1>
                    <input name="points" 
                    type="number"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->points }}">

                    <h1 class="text-white">Rebounds</h1>
                    <input name="rebounds" 
                    type="number"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->rebounds }}">

                    <h1 class="text-white">Assists</h1>
                    <input name="assists" 
                    type="number"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->assists }}">

                    <h1 class="text-white">Blocks</h1>
                    <input name="blocks" 
                    type="number"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->blocks }}">

                    <h1 class="text-white">Steals</h1>
                    <input name="steals" 
                    type="number"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->steals }}">

                    <h1 class="text-white">Turnovers</h1>
                    <input name="turnovers" 
                    type="number"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->turnovers }}">

                    <h1 class="text-white">Threepoints</h1>
                    <input name="threepoints" 
                    type="number"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->threepoints }}">

                    <h1 class="text-white">Freethrows</h1>
                    <input name="freethrows" 
                    type="number"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->freethrows }}">

                    <h1 class="text-white">Fantasy</h1>
                    <input name="fantasy" 
                    type="number"
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $player->fantasy }}">

                    <button type="submit" class="bg-green-700 text-white h-xs rounded-full">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection