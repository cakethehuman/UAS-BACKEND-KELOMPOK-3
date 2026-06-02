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
}
