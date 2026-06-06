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

    protected static function booted()
    {
        static::created(function (Game $game) {
            $seats = [];
            $rows = ['A', 'B', 'C', 'D', 'E']; // 5 rows

            foreach ($rows as $row) {
                for ($col = 1; $col <= 10; $col++) { 
                    $seats[] = [
                        'game_id'           => $game->id,
                        'seat_number'       => $row . $col, 
                        'seat_price'        => 50.00,
                        'seat_availability' => 'Available',
                        'created_at'        => now(),
                        'updated_at'        => now(),
                    ];
                }
            }
            Seat::insert($seats); 
    });
    }
}
