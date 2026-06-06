@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">          
        <h1 class="text-white font-bold text-3xl w-55 h-15 py-2 text-center 
            border-2 bg-gray-800 border-mavs-navy rounded-full m-5 shadow-lg shadow-mavs-navy">
            Create Seats
        </h1>
    </div>
    <section id="form">
        <div class="flex items-center justify-center">
            <div class="border border-5 border-mavs-navy px-2 py-2 w-5xl rounded-xl">
                <form method = 'POST' action="{{ route('games.seats.store', $gameId) }}">
                    @csrf
                    <div class="flex flex-col gap-3">
                        <h1 class="text-white">Seat Price</h1>
                        <input class='border border-mavs-navy bg-white rounded-full pl-4'
                        step="0.5" 
                        name="seat_price" type="number" required>

                        <h1 class="text-white">Seat Number</h1>
                        <input name="seat_number" 
                            type="text"
                            class="border border-mavs-navy bg-white rounded-full pl-4" required>

                        <label class="text-white" for="seat_availability">Seat Availability: </label>
                        <select class="border border-mavs-navy bg-white rounded-full pl-4" name="seat_availability" id="seat_availability">
                            <option value="Available">Available</option>
                            <option value="Booked">Booked</option>
                            <option value="Done">Done</option>
                        </select>


                        <button class = 'text-white bg-green-700 rounded-full' type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection