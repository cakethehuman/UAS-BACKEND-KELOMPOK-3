<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seats = Seat::all();
        return view("seats.show", compact("seats"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("seats.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $gameId)
    {
        $request->validate([
            'seat_price'=> 'required|numeric|decimal:0,2',
            'seat_number'=> 'required|string',
            'seat_availability'=> 'required|string|max:50',
        ]);

        $data = $request->all();
        $data['game_id'] = $gameId;
        Seat::create($data);

        return redirect()->route('seats.index')->with('success','The game is inserted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seat $seat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seat $seat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seat $seat)
    {
        //
    }
}
