<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['home_team_id','away_team_id','scheduled_date','game_status'];
    protected $casts = ['scheduled_date' => 'datetime',];

    public function homeTeam(){
        return $this->belongsTo(Team::class, 'home_team_id');
    }
    public function AwayTeam(){
        return $this->belongsTo(Team::class,'away_team_id');
    }
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public function tickets()
    {
    	return $this->hasMany(Ticket::class);
    }
    
    protected static function booted()
    {
        static::created(function (Game $game) { 
            $rows = ['A', 'B', 'C', 'D', 'E']; 
	    $seats = [];
            foreach ($rows as $row) {
                for ($col = 1; $col <= 10; $col++) { 
			$seats[] = Seat::create([
                            'game_id'           => $game->id,
                            'seat_number'       => $row . $col, 
                            'seat_price'        => 50.00,
                            'seat_availability' => 'Available', 
                        ]);
                }
            }
	    foreach ($seats as $seat){
		    Ticket::create([
			    'user_id' => null,
			    'seat_id' => $seat->id 
		    ]);
	    }
	     
    });
    }
}
