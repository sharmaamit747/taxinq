<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = ['userid', 'school', 'degree', 'fos', 'year', 'extra1', 'extra2'];
}
