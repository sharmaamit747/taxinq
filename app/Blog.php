<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'category_id', 'tag_id', 'pic', 'title', 'content', 'slug', 'author', 'extra'
    ];
}
