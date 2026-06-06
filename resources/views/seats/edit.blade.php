@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-50 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Edit Seats
        </h1>
    </div>
    <div class="flex items-center justify-center">
        <div class="border border-5 border-mavs-navy px-2 py-2 w-5xl rounded-xl">
            
            <form method="POST" action="{{ route('seats.update', $seat->id) }}">
                @csrf 
                @method('PUT')
                
                <div class="flex flex-col gap-3">
                    <h1 class="text-white">Seat Price</h1>
                    <input name="seat_price" 
                    type="number" step="0.5"
                    class="border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $seat->seat_price }}" required>

                    <h1 class="text-white">Seat Number</h1>
                    <input name="seat_number" 
                    type="text"
                    class="border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $seat->seat_number }}" required>

                    <h1 class="text-white">Seat Availability</h1>
                    <input name="seat_availability" 
                    type="text"
                    class="border border-mavs-navy bg-white rounded-full pl-4" 
                    value="{{ $seat->seat_availability }}" required>

                    <button type="submit" class="bg-green-700 text-white h-xs rounded-full py-2 font-bold">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection