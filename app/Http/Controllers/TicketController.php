<?php
namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Seat;
use App\Models\Team;
use App\Models\Ticket;
use App\Models\User;
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
	try {
		DB::transaction(function() use ($seat, $game) {
			$current_user = User::where('id', Auth::id())
				      ->lockForUpdate()
				      ->first();
			foreach ($game->seats as $current_seat) {
				if ($current_seat->ticket->user_id === $current_user->id)
					throw new Exception('You already booked a ticket on this game!');
			}
			if ($current_user->credits < $seat->seat_price)
				throw new Exception("You don't have sufficient credit!");
			$seat = Seat::where('id', $seat->id)->lockForUpdate()->first();
			$ticket = $seat->ticket;
			if (!($ticket->is_booked) && $seat->seat_availability === 'Available' && $current_user->credits >= $seat->seat_price){		
				$seat->update(['seat_availability' => 'Not Available']);
				$ticket->update([
					'is_booked' => true,
					'user_id'   => $current_user->id
				]);
				$current_user->decrement('credits', $seat->seat_price);
			}
			
			else {
				throw new Exception('Ticket already booked!');
			}	
		});	

	 	return redirect()->route('tickets.game', $game)->with('success', 'Ticket has been booked');
	    }		

	catch (Exception $e) {
		return back()
		       ->withErrors(['error' => $e->getMessage()])	
		       ->withInput();
	}	
		
	
	
	
    }
    /**
     * Show the form for creating a new resource.
     */
    public function showConfirm(Game $game, Seat $seat) {	
	$current_user = Auth::user();
	return view('tickets.showConfirm', ['game' => $game, 'seat' => $seat, 'user' => $current_user]); 
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
	$current_user = Auth::user();
	$userHasSeat = false;
	

	if ($userHasSeat) {
		$userHasSeat =	$game->seats()
		     ->whereHas('ticket', function ($query) use ($current_user){
		     	$query->where('user_id', $current_user->id);
		     })->exists();
	}
		
	 
    	return view("tickets.showGame", ['game' => $game, 'hasSeat' => $userHasSeat]);	
    }

    public function showSeat(Game $game, Seat $seat) {	
    	return view('tickets.showSeat', ['game' => $game, 'seat' => $seat]);
    }

    public function cancel(Game $game, Seat $seat) {
   	$current_user = Auth::user();
	$ticket = $seat->ticket;
	if ($current_user->is_admin){
		try {
			DB::transaction(function() use ($seat, $ticket, $game) {
				$ticket = Ticket::where('id', $ticket->id)
					  ->lockForUpdate()
				  	  ->first();
				$current_user = User::where('id', $ticket->user_id)
					      ->lockForUpdate()
					      ->first();
				
			
				$seat = Seat::where('id', $seat->id)->lockForUpdate()->first();	
				if ($ticket->is_booked && $seat->seat_availability !== 'Available'){		
					$seat->update(['seat_availability' => 'Available']);
					$ticket->update([
						'is_booked' => false,
						'user_id'   => null 
					]);
					$current_user->increment('credits', $seat->seat_price);
				}
				
				else {
					throw new Exception('Ticket is not booked');
				}	
				
			});	
	
		    }		

		catch (Exception $e) {
			return back()
			       ->withErrors(['error' => $e->getMessage()])	
			       ->withInput();
		}	
	
	return redirect()->route('tickets.game', $game)->with('success', 'Ticket has been cancelled');	
	}	
	else {
		return view('tickets.showSeat', ['game' => $game, 'seat' => $seat]);
	}
    }

}


