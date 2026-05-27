<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ["name","city","abbreviation","logo","conference",
                            "division","wins","losses","arena"];
}
