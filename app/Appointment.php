<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'your_name', 'email', 'mobile', 'query_id', 'law_id', 'slug', 'message', 'status', 'consultant_id', 'extra1', 'extra2'
    ];
}
