<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view("teams.index", compact("teams"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create',  Team::class); 
        return view("teams.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 100 dan 50 ini dipilih karena untuk minmize varcharnya biar lebih cepet dbnya
        // 100 and 50 varchar values is selected so the database could be more efficent
	// lanjutan dari create, maka harus diauthorize
	Gate::authorize('create', Team::class);
        $request->validate([
            'name' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'abbreviation' => 'required|string|max:10',
            'logo' => 'required|string|max:100',
            'conference' => 'required|string|max:50',
            'division' => 'required|string|max:50',
            'wins' => 'required|integer|min:0',
            'losses' => 'required|integer|min:0',
            'arena' => 'required|string|max:100',
        ]);

        Team::create($request->all());

        return redirect()->route('teams.index')->with('success','The team is inserted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
    	Gate::authorize('update', $team);
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
	Gate::authorize('update', $team);
        $request->validate([
            'name' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'abbreviation' => 'required|string|max:10',
            'logo' => 'required|string|max:100',
            'conference' => 'required|string|max:50',
            'division' => 'required|string|max:50',
            'wins' => 'required|integer|min:0',
            'losses' => 'required|integer|min:0',
            'arena' => 'required|string|max:100',
        ]);

        $team->update($request->all());

        return redirect()->route('teams.index')->with('success','The team is edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
	Gate::authorize('delete', $team);
        $team -> delete();

        return redirect()->route('teams.index')->with('success','The team is deleted successfully.');
    }
}
