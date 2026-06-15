@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Edit Team
        </h1>
    </div>
    <div class="flex items-center justify-center">
        <div class="border border-5 border-mavs-navy px-2 py-2 w-5xl rounded-xl">
            <form method="POST" action="{{ route('teams.update', $team) }}">
                @csrf @method('PUT')
                <div class="flex flex-col gap-3">
                    <h1 class="text-white">Name</h1>
                    <input name="name" 
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $team->name }}">
   
                    <h1 class="text-white">City</h1>
                    <input name="city" 
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $team->city }}">

                    <h1 class="text-white">abbreviation</h1>
                    <input name="abbreviation" 
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $team->abbreviation }}">

                    <h1 class="text-white">logo</h1>
                    <input name="logo" 
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $team->logo }}">

                    <h1 class="text-white">conference</h1>
                    <select name="conference" class="border border-mavs-navy bg-white rounded-full pl-4">
                        <option value="">Select a Confrence : </option>
                        @foreach($conference as $cf)
                            <option value="{{ $cf }}" @selected($team->conference == $cf)>
                                {{ $cf }}
                            </option>
                        @endforeach
                    </select>

                    <h1 class="text-white">division</h1>
                    <select name="division" class="border border-mavs-navy bg-white rounded-full pl-4">
                    <option value="">Select a Devision : </option>
                        @foreach($devision as $div)
                            <option value="{{ $div }}" @selected($team->division == $div)>
                                {{ $div }}
                            </option>
                        @endforeach
                    </select>

                    <h1 class="text-white">wins</h1>
                    <input name="wins" 
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    type="number" value="{{ $team->wins }}">

                    <h1 class="text-white">losses</h1>
                    <input name="losses" 
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    type="number" value="{{ $team->losses }}">

                    <h1 class="text-white">arena</h1>
                    <input name="arena" 
                    class = "border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $team->arena }}">

                    <button type="submit" class="bg-green-700 text-white h-xs rounded-full">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection