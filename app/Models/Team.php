<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public const CONFERENCE = [
        'Western', 'Eastern'
    ];

    public const DIVISIONS = [
        'Atlantic', 'Central', 'Southeast', 
        'Northwest', 'Pacific', 'Southwest'
    ];
    protected $fillable = ['name','city','abbreviation','logo','conference',
                            'division','wins','losses','arena'];
}
