<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
    public function create($gameId)
    {
	Gate::authorize('create', Seat::class);
        return view("seats.create", compact('gameId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $gameId)
    {
	Gate::authorize('create', Seat::class);
        $request->validate([
            'seat_price'=> 'required|numeric|decimal:0,2',
            'seat_number'=> 'required|string',
            'seat_availability'=> 'required|string|max:50',
        ]);

        $data = $request->all();
        $data['game_id'] = $gameId;
        Seat::create($data);

        return redirect()->route('games.index')->with('success','The game is inserted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game,Seat $seat)
    {
        return view('seats.show', compact('game', 'seat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seat $seat)
    {
	Gate::authorize('update', $seat);
        return view('seats.edit', compact('seat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seat $seat)
    {
	Gate::authorize('update', $seat);
        $validated = $request->validate([
            'seat_price'=> 'required|numeric|decimal:0,2',
            'seat_number'=> 'required|string',
            'seat_availability'=> 'required|string|max:50',
        ]);
        
        $seat->update($validated);
        return redirect()->route('games.index')->with('success', 'Product successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seat $seat)
    {
	Gate::authorize("delete", $seat);
        $seat->delete();
        return redirect()->route('games.index')->with('success', 'Seat Has Been deleted.');
    }
}
