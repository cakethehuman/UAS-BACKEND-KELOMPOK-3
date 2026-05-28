<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class StandingsController extends Controller
{
    public function index()
    {
        $eastTeams = Team::where('conference', 'Eastern')
                         ->orderBy('name')
                         ->get()
                         ->toArray();
        
        $westTeams = Team::where('conference', 'Western')
                         ->orderBy('name')
                         ->get()
                         ->toArray();

        return view('standings.index', compact('eastTeams', 'westTeams'));
    }
}