<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emailchatfile extends Model
{
    protected $fillable = ['appointment_id', 'attachment', 'extra', 'extraid'];
}
