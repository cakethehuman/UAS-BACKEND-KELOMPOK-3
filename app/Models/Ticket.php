<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	protected $fillable = [
		'user_id',	
		'seat_id',	
		'is_booked'
	]; 

	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}

	public function seats(){
		return $this->belongsTo(Seat::class, 'seat_id');
	}
}
