<?php

namespace App\Library;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Permission;
use Auth;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Permissions {

    public $error;

    public function is_allow($per_key) {
        $users = User::where('id', Auth::user()->id)->get();
        $user = $users[0];
        if ($user->user_type == 'superadmin') {
            return TRUE;
        } else {
            $permissions = explode(',', $user->permissions);
            if (in_array($per_key, $permissions)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

}
