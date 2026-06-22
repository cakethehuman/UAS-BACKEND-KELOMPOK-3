@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Top Up
        </h1>
    </div>
    <section>
        <h1 class="text-white">{{ $user->credits }}</h1>
    </section>
    <a href="{{ route('topup.edit', $user) }}">
        Edit Credits
    </a>

    


@endsection
