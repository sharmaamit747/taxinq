<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laws extends Model
{
    protected $fillable = ['title', 'slug', 'status', 'extra'];
}
