<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['pfp','name','team','height','weight','country', 'age', 'role', 'yearspro', 'points', 'rebounds', 'assists', 'blocks', 'steals', 'turnovers', 'threepoints', 'freethrows', 'fantasy'];
}