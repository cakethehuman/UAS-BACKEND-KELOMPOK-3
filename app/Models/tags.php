<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    protected $fillable = ['name'];
 
    public function articles()
    {
         return $this->belongsToMany(Article::class, 'article_tag', 'tag_id', 'article_id');
    }
}
