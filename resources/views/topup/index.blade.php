@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Top Up
        </h1>
    </div>
    <section class="flex items-center justify-center">
        <div class="flex flex-col items-center justify-center border border-mavs-navy border-3 w-xl h-50 shadow-lg shadow-mavs-navy">
            <h1 class="text-white text-3xl"> Total credit = {{ $user->credits }}</h1>
            <a class = "border border-2 bg-green-600 rounded-full px-2" href="{{ route('topup.edit', $user) }}">
                Edit Credits
            </a>
        </div>
    </section>
@endsection
