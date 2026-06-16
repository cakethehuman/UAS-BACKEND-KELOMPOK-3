<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class StatsController extends Controller
{
    public function index(Request $request)
    {
        $player = Player::select([
            'name', 'team', 'age', 'points', 'rebounds', 'assists',
            'blocks', 'steals', 'turnovers', 'threepoints', 'freethrows', 'fantasy'
        ])->get();

        return view('stats.index', compact('player'));
    }
}
