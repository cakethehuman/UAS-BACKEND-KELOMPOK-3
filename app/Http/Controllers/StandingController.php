<?php

namespace App\Http\Controllers;

use App\Models\Standing;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $standings = Standing::with(['team'])->get();
        return view('standings.index', compact('standings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
	Gate::authorize("create", Standing::class);	
        $teams = Team::all();
        return view('standings.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
	Gate::authorize("create", Standing::class);	
        $request->validate([
            'team_id'=> 'required|exists:teams,id',
        ]);

        Standing::create($request->all());
        return redirect()->route('games.index')->with('success','The standing is inserted successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Standing $standing)
    {	
        $standing->load('team');

        return view('standings.show', compact('standing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Standing $standing)
    {
	Gate::authorize("update", $standing);	
        $teams = Team::all();
        $standing->load('team');

        return view('standings.edit', compact('standing', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Standing $standing)
    {
	Gate::authorize("update", $standing);	
        $validated = $request->validate([ 
            'team_id' => 'required|exists:teams,id',
        ]);

        $standing->update($validated); 

        return redirect()->route('standings.index')->with('success', 'Standing berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Standing $standing)
    {
	Gate::authorize("delete", $standing);	
        $standing->delete();

        return redirect()->route('standings.index')->with('success', 'Standing berhasil dihapus.');
    }
}
