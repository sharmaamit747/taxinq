<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $fillable = ['title', 'slug', 'status', 'extra'];
}
