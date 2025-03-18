<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use Session;
use File;
use App\Library\Permissions;
use Illuminate\Support\Str;
use App\Slider;
use App\Blog;
use App\User;
use App\Contact;
use App\Query;
use App\Laws;
use App\Appointment;
use App\Comment;
use App\BlogCategory;
use App\BlogTag;
use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $info = User::where('id', Auth::user()->id)->get();
        if (Auth::user() != null && Auth::user()->userType == 1) {
            return view('home');
        }
        else if (Auth::user() != null && Auth::user()->userType == 2) {
            $request->session()->flash('flash_notification.success', 'Login Successfully');
            return redirect()->to('/consultant/home');
        } else{
            $request->session()->flash('flash_notification.success', 'Login Successfully');
            return redirect()->to('/client/home');
        }
    }
}
