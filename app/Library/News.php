<?php

namespace App\Library;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Blog;
use Auth;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class News {

    public $error;

    public function blogs() {
            $res = Blog::limit(2)->get();
            foreach ($res as $key => &$value) {
                $value->dates = date("M d, Y", strtotime($value->created_at));
            }
            if ($res) {
                return $res;
            } else {
                return FALSE;
            }
    }

}
