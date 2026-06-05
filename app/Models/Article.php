<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Article extends Model
{
    protected $fillable = ['title', 'content', 'image', 'slug', 'published_at'];
 
    protected $casts = ['published_at' => 'datetime'];

    //use slug for cooler URL
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}