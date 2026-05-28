<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name', 'category', 'type', 'description','price', 'image', 'store_link'];
 
}
