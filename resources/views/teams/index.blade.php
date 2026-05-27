@extends('layouts.app')

@section('content')
    <div class="flex border border-mavs-navy rounded-full w-3xl">
        <h1 class="text-white">Teams</h1>
    </div>
    <section id="teams" class="flex justify-center">
        <div class="flex justify-center border border-mavs-navy border-3 shadow-md shadow-mavs-navy rounded-lg w-5xl my-5">
            <div class="grid grid-cols-5 gap-15 px-8 py-8">
                @if($teams -> isEmpty())
                    <p class="text-white">No teams</p>
                @else
                    @foreach ($teams as $team)
                        <!-- border border-3 border-mavs-navy  -->
                        <div class="border border-3 border-mavs-navy rounded-xl w-50">
                            <div class="flex flex-col px-5 py-5">
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
    <section id="Edit">
        <a class="text-white" href="{{ route('teams.create') }}">Buat Post Baru</a>
        <br><br>
    </section>
@endsection