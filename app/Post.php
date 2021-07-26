<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'author', 'body', 'img', 'note'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}