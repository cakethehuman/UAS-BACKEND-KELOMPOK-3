@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Standings
        </h1>
    </div>
    <section id="standings" class="flex justify-center">
        <div class="flex flex-row items-center justify-center border border-mavs-navy border-3 shadow-md shadow-mavs-navy rounded-lg w-5xl my-3 bg-gray-900">
            <div class="flex flex-col gap-5 px-8 py-8">
                <div class="grid grid-cols-4 items-center text-white font-bold border-3 border-mavs-navy rounded-lg bg-gray-800 px-6 py-4 w-4xl">
                    <h1 class="col-span-1 text-left">Team</h1>
                    <h1 class="col-span-1 text-center">Win</h1>
                    <h1 class="col-span-1 text-center">Loss</h1>
                    <h1 class="col-span-1 text-center">Actions</h1>
                </div>
                @if($standings -> isEmpty())
                    <p class="text-white">No Standings</p>
                @else
                    @foreach($standings as  $standing)
                        <div class="grid grid-cols-4 items-center text-white border-3 border-mavs-navy rounded-lg bg-gray-800 px-6 py-4">
                            <h1 class="col-span-1 text-left">{{ $standing->team->name }}</h1>
                            <h1 class="col-span-1 text-center">{{ $standing->team->wins }}</h1>
                            <h1 class="col-span-1 text-center">{{ $standing->team->losses }}</h1>
                            <div class="flex flex-row justify-center items-center gap-2 py-2">
                                <a class="bg-blue-700 
                                rounded-full w-7 h-5 text-white text-xs flex items-center 
                                justify-center" href="{{ route('teams.index') }}">🔍</a>
				@can("delete", $standing)	
					<form action="{{ route('standings.destroy',  $standing) }}" method="POST">
					    @csrf
					    @method('DELETE')
					    <button class='bg-red-700 rounded-full w-7 h-5 text-white text-xs 
					    flex items-center justify-center' type="submit">X</button>
					</form>
				@endcan
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <div class="flex items-center justify-center">
	@can("create", App\Models\Standing::class)
		<a href="{{ route('standings.create') }}" 
		    class="w-3xl my-4 px-3 py-2 font-semibold text-center 
		    text-white transition duration-200 ease-in-out 
		    bg-green-500 rounded-lg hover:bg-green-500/90 
		    focus:outline-none focus:ring-2 focus:ring-gray-500 
		    focus:ring-offset-2 focus:ring-offset-gray-800">
		    Add Standings
		</a>
	@endcan
    </div>
@endsection

