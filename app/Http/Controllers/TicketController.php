<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Seat;
use App\Models\Team;
use App\Models\Ticket;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {	
       $tickets = Ticket::all(); 	    		    
       $months = ['Any Month'];
       for ($counter = 1; $counter <=12; $counter++)
       {
       	$months[] = Carbon::create()->month($counter)->format('F');
       }
       $teams = Team::all(); 
       $games = Game::with('seats.ticket')->get();
       return view('tickets.index', ['data' => $tickets, 'games' => $games, 'teams' => $teams, 'months' => $months]); 
    }

    /** melakukan booking untuk seat dan ticket yang ada 
     *  data akan diupdate ke database dengan menggunakan DB::transaction() agar
     *  $seat = Seat::where('id', $seat->id) mencari seat dengan seat id nya, lalu ->lockForUpdate() untuk mencegah
     *  terjadinya selection lebih dari 1 kali sebelum diproses di database ->first() untuk mengambil data pertama
     *  dari query yang ada
     *  jika terjadi error, database dapat dirollback
     */
    public function book(Game $game, Seat $seat) {
	
	$current_user = Auth::user();	

	
		
	DB::transaction(function() use ($seat, $game, $current_user) {
	        try {
			foreach ($game->seats as $current_seat) {
				if ($current_seat->ticket->user_id === $current_user->id)
					throw new Exception('You already booked a ticket on this game!');
			}
	       		$seat = Seat::where('id', $seat->id)->lockForUpdate()->first();
			$ticket = $seat->ticket;
			if (!($ticket->is_booked) && $seat->seat_availability === 'Available'){
				$seat->update(['seat_availability' => 'Not Available']);
				$ticket->update([
					'is_booked' => true,
					'user_id'   => $current_user->id
				]);
			}
			
			else {
				throw new Exception('Ticket already booked!');
			} 	
		}		

		catch (Exception $e) {
			return back()
			       ->withErrors(['ticket_already_booked' => $e->getMessage()])	
		       	       ->withInput();
		}	
	});	

	return redirect()->route('tickets.game', $game)->with('success', 'Ticket has been booked');
	
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

    public function showFoundGame(Request $request){
	    $selectedTeam = $request->input('team');
    	    $selectedMonth = $request->input('month');	    

	    if ($selectedTeam === "Any Team")
		    ;
	    else {
	            $selectedTeamId = Team::whereName($selectedTeam)->first()->id;

		    $games = []; 

		    $game1 = Game::whereAwayTeamId($selectedTeamId)->get();
		    
		    $game2 = Game::whereHomeTeamId($selectedTeamId)->get(); 	
	    }
	    

	    if ($selectedMonth === "Any Month") {
		if ($selectedTeam === "Any Team")
			$games = Game::all();
		else {
			foreach ($game1 as $game)
			    {	
				$games[] = $game;	
			    }

	     		foreach ($game2 as $game)
			    {	
				$games[] = $game;	
			    }		
		}
	     	
	    }
	    else {

		if ($selectedTeam === "Any Team"){
			$game = Game::all();
			$games = [];
			foreach ($game as $game_now){
				if ($game_now->scheduled_date->monthName === $selectedMonth)
					$games[] = $game_now;
			}
		}
		else {
			foreach ($game1 as $game)
			    {
				if ($game->scheduled_date->monthName === $selectedMonth)
					$games[] = $game;	
			    }	    

	    		foreach ($game2 as $game)
			    {
				if ($game->scheduled_date->monthName === $selectedMonth)
					$games[] = $game;	
			    }		
		}
					 
	    }
	    

	   return view("tickets.found", ["games" => $games]);
    } 

    public function showGame(Game $game) {
    	return view("tickets.showGame", ['game' => $game]);	
    }

    public function showSeat(Game $game, Seat $seat) {
    	return view('tickets.showSeat', ['game' => $game, 'seat' => $seat]);
    }

}


