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
                        <div class="flex flex-col px-5 py-5 w-70">
                            <h1 class = "text-white text-md">{{ $team -> name }}</h1>
                            <form action="{{ route('teams.destroy', $team) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class='border border-red-700 bg-red-700 rounded-full w-7 h-5 text-white text-xs' --type="submit">X</button>
                            </form>
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