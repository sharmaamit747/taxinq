<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
         'app_name', 'email', 'contact', 'facebook_id', 'twitter_id', 'instagram_id', 'linkedin_id', 'youtube_id', 'address', 'logo', 'wlogo', 'favicon', 'extra1', 'extra2'
    ];
}
