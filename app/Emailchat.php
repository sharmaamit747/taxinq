<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emailchat extends Model
{
    protected $fillable = ['sender_id', 'appointment_id', 'status', 'message', 'subject', 'extraid'];
}
