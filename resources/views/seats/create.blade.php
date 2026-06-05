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
                <form method = 'POST' action="{{ route('seats.store', $gameId) }}">
                    @csrf
                    <div class="flex flex-col gap-3">
                        <h1 class="text-white">Seat Price</h1>
                        <input class='border border-mavs-navy bg-white rounded-full pl-4' 
                        name="seat_price" type="number" required>

                        <label class="text-white" for="seat_number">Seat Number :  </label>
                        <select class="border border-mavs-navy bg-white rounded-full pl-4" name="seat_number" id="seat_number">
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                            <option value="A3">A3</option>
                        </select>

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