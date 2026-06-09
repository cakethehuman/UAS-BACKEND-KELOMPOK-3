@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Teams
        </h1>
    </div>
    </section>
    <section id="teams" class="flex justify-center">
        <div class="flex justify-center border border-mavs-navy border-4 shadow-md shadow-mavs-navy rounded-lg w-5xl my-3 bg-gray-900 shadow-xl shadow-blue-900">
            <div class="grid grid-cols-3 gap-25 px-6 py-6">
                @if($teams -> isEmpty())
                    <p class="text-white">No teams</p>
                @else
                    @foreach ($teams as $team)
                        <!-- border border-3 border-mavs-navy  -->
                        <div class="border border-3 border-mavs-navy rounded-2xl w-full bg-gray-800 hover:border-blue-700">
                            <div class="flex flex-col px-5 py-5 items-center justify-center">
                                <img 
                                class = "w-38 h-38 object-contain items-center"
                                src={{ asset($team -> logo) }} 
                                alt="teamLogo">
                                <h1 class = "text-white text-md">{{ $team -> name }}</h1>
                
                                <div class="flex items-center gap-2">
                                    <a class="bg-blue-700 
                                    rounded-full w-7 h-5 text-white text-xs flex items-center 
                                    justify-center" href="{{ route('teams.show', $team) }}">🔍</a>
                                    <a class="bg-yellow-500 
                                    rounded-full w-7 h-5 text-white text-xs flex items-center 
                                    justify-center" href="{{ route('teams.edit', $team) }}">📝</a>
                                    <form action="{{ route('teams.destroy', $team) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class='bg-red-700 rounded-full w-7 h-5 text-white text-xs 
                                        flex items-center justify-center' type="submit">X</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    @can('create', App\Models\Team::class)
    <section id="Edit" class="flex justify-center">
        <div class="flex w-5xl items-center justify-center">
            <a class="text-white border border-2 border-green-600 rounded-full h-7 px-5 bg-green-600" href="{{ route('teams.create') }}"> + Buat Post Baru</a>
        </div>
     @endcan
    </section>
@endsection
