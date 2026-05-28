@extends('layouts.app')

@section('content')
    <div class="flex border border-mavs-navy rounded-full w-3xl">
        <h1 class="text-white">Games</h1>
    </div>
    <section id="teams" class="flex justify-center">
        <div class="flex justify-center border border-mavs-navy border-3 shadow-md shadow-mavs-navy rounded-lg w-5xl my-5">
            <div class="grid grid-cols-5 gap-25 px-8 py-8">
                @if($games -> isEmpty())
                    <p class="text-white">Games are being blade</p>
                @else
                    <div class="border border-navy w-2xl">
                        <h1>hellow</h1>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section id="Edit">
        <a class="text-white" href="{{ route('games.create') }}">Add game</a>
    </section>
@endsection