<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $fillable = ['article_id', 'body'];
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
