<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::with(['homeTeam', 'awayTeam'])
        ->orderBy('scheduled_date', 'desc')
        ->paginate(10);


        return view("games.index", compact("games"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
	Gate::authorize('create', Game::class);
        return view("games.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
	Gate::authorize('create', Game::class);
        $request->validate([
            'home_team_id'=> 'required|exists:teams,id',
            'away_team_id'=> 'required|exists:teams,id',
            'scheduled_date'=> 'required|date',
            'game_status'=> 'required|string|max:50',
        ]);

        Game::create($request->all());
        return redirect()->route('games.index')->with('success','The game is inserted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
	Gate::authorize('update', $game);	
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
	Gate::authorize('update', $game);
        $request->validate([
            'home_team_id'=> 'required|exists:teams,id',
            'away_team_id'=> 'required|exists:teams,id',
            'scheduled_date'=> 'required|date',
            'game_status'=> 'required|string|max:50',
        ]);
        $game->update($request->all());
        return redirect()->route('games.index')->with('success','The game is edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
	Gate::authorize('delete', $game);
        $game->delete();
        return redirect()->route('games.index')->with('success','The game is edited successfully deleted.');
    }
}
