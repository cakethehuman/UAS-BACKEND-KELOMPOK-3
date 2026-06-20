<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {	
       $tickets = Ticket::all(); 	    		    
       $months = [];
       for ($counter = 1; $counter <=12; $counter++)
       {
       	$months[] = Carbon::create()->month($counter)->format('F');
       }
       $teams = Team::all(); 
       $games = Game::with('seats.tickets')->get();
       return view('tickets.index', ['data' => $tickets, 'games' => $games, 'teams' => $teams, 'months' => $months]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
	   // Ticket::create([
	   // 	
	   // ]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
