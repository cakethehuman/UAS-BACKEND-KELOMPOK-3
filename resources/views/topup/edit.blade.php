@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Top Up
        </h1>
    </div>
    <div class="flex items-center justify-center">
        <div class="flex items-center justify-center border-2 border-mavs-navy w-xl shadow-lg shadow-mavs-navy">
            <form class="flex flex-col m-5" action="{{ route('topup.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <input
                    class = "bg-white m-2"
                    type="number"
                    name="amount"
                    min="1"
                    step="0.01"
                    required>

                <button type="submit" class="bg-green-500 rounded-full">
                    Add Credits
                </button>
            </form>
        </div>
    </div>
@endsection
