<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'tags', 'pic', 'title', 'content', 'slug', 'author', 'extra'
    ];
}
