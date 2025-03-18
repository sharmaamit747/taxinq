<?php

namespace App\Library;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Content;
use App\Setting;
use Auth;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Contents {

    public $error;

    public function content() {
        $res = Setting::where('id', 1)->first();
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }

}
