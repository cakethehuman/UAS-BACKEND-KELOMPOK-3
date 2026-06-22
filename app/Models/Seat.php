<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = ['game_id','seat_price','seat_number','seat_availability'];

    public function gameInfo(){
        return $this->belongsTo(Game::class, 'game_id');
    }
    public function ticket()
    {
    	return $this->hasOne(Ticket::class);
    }
}
