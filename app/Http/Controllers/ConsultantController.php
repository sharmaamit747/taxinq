<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Auth;
use Session;
use File;
use App\Library\Permissions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use App\Education;

class ConsultantController extends Controller {

    public function message($type, $msg, $data = null) {
        $this->data['type'] = $type;
        $this->data['message'] = $msg;
        $this->data['data'] = $data;
        echo json_encode($this->data);
    }
    
    function generateRandomString($length) {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    public function index(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 2) {
            return redirect()->route('login');
        }
        return View('consultant.index');
    }
    
    public function consultants(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        return View('admin.consultant.consultant');
    }
    
    public function appointments(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 2) {
            return redirect()->route('login');
        }
        return View('consultant.appointments');
    }
    
    public function consultants_table() {
        $res = User::where('userType', 2)->orderBy('id', 'DESC')->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<button category_id='" . $value->id . "' class='btn btn-sm btn-default edit-consultants' data-bs-toggle='modal' data-bs-target='#edit-consultants'><i class='fa fa-edit'></i></button>"
                    . "<button category_id='" . $value->id . "' class='btn btn-sm btn-default delete_consultants'><i class='fa fa-trash text-danger'></i></button>";
            $i++;
        }
        $this->message('success', '', $res);
    }
    
    public function create_consultants(Request $request) {
        if ($request->file('file') == null) {
            $photoPath = null;
        } else {
            $image = $request->file('file');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/user/';
            $photoPath = "images/user/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
        }
        $co = User::where('slug', Str::slug($request->name, '-'))->count();
        if (Blog::where('slug', Str::slug($request->name, '-'))->count() > 0) {
            $slug = Str::slug($request->name, '-') . '-' . $this->generateRandomString(500);
        } else {
            $slug = Str::slug($request->name, '-');
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'extra1' => $request->extra1,
            'userType' => 2,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'about' => $request->about,
            'slug' => $slug,
            'title' => $request->title,
            'password' => Hash::make($request->extra1),
            'pic' => $photoPath,
        ];
        $res = User::create($data);
        if ($res) {
            $this->message('success', 'consultant Create Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function edit_consultants(Request $request) {
        $old = $request->old;
        if ($request->file('file') == null || $request->file('file') == '') {
            if ($request->old == '') {
                $photoPath = null;
            } else {
                $photoPath = $request->old;
            }
        } else {
            $image = $request->file('file');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/user/';
            $photoPath = "images/user/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
            File::delete($request->old);
        }
        $datas = [
            'name' => $request->name,
            'extra1' => $request->extra1,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'about' => $request->about,
            'title' => $request->title,
            'pic' => $photoPath
        ];
        $data = User::where(['id' => $request->id]);
        $res = $data->update($datas);
        if ($res) {
            $this->message('success', 'consultant Update Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }
    
    public function profile(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 2) {
            return redirect()->route('login');
        }
        $edu = Education::where('userid', Auth::user()->id)->get();
        return View('consultant.profile', compact('edu'));
    }
    
}

