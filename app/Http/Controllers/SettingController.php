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
use App\Slider;
use App\Testimonial;
use App\Setting;
use App\Laws;
use App\Query;

class SettingController extends Controller {

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
    
    public function slider(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        return View('admin.setting.slider');
    }
    
    public function slider_table() {
        $res = Slider::orderBy('id', 'DESC')->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<button category_id='" . $value->id . "' class='btn btn-sm btn-default edit-slider' data-bs-toggle='modal' data-bs-target='#edit-slider'><i class='fa fa-edit'></i></button>"
                    . "<button category_id='" . $value->id . "' class='btn btn-sm btn-default delete_slider'><i class='fa fa-trash text-danger'></i></button>";
            $i++;
        }
        $this->message('success', '', $res);
    }
    
    public function create_slider(Request $request) {
        if ($request->file('file') == null) {
            $photoPath = null;
        } else {
            $image = $request->file('file');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/slider/';
            $photoPath = "images/slider/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
        }
        $data = [
            'title' => $request->title,
            'link' => $request->link,
            'content' => $request->content,
            'pic' => $photoPath,
        ];
        $res = Slider::create($data);

        if ($res) {
            $this->message('success', 'Slider Create Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function edit_slider(Request $request) {
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
            $destinationPath = 'images/slider/';
            $photoPath = "images/slider/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
            File::delete($request->old);
        }
        $datas = [
            'title' => $request->title,
            'link' => $request->link,
            'content' => $request->content,
            'pic' => $photoPath,
        ];
        $data = Slider::where(['id' => $request->id]);
        $res = $data->update($datas);
        if ($res) {
            $this->message('success', 'Slider Update Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }
    
    public function testimonial(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        return View('admin.setting.testimonial');
    }
    
    public function testimonial_table() {
        $res = Testimonial::orderBy('id', 'DESC')->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<button category_id='" . $value->id . "' class='btn btn-sm btn-default edit-testimonial' data-bs-toggle='modal' data-bs-target='#edit-testimonial'><i class='fa fa-edit'></i></button>"
                    . "<button category_id='" . $value->id . "' class='btn btn-sm btn-default delete_testimonial'><i class='fa fa-trash text-danger'></i></button>";
            $i++;
        }
        $this->message('success', '', $res);
    }
    
    public function create_testimonial(Request $request) {
        if ($request->file('file') == null) {
            $photoPath = null;
        } else {
            $image = $request->file('file');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/testimonial/';
            $photoPath = "images/testimonial/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
        }
        $data = [
            'name' => $request->title,
            'subject' => $request->subject,
            'message' => $request->message,
            'pic' => $photoPath,
        ];
        $res = Testimonial::create($data);

        if ($res) {
            $this->message('success', 'Testimonial Create Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function edit_testimonial(Request $request) {
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
            $destinationPath = 'images/testimonial/';
            $photoPath = "images/testimonial/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
            File::delete($request->old);
        }
        $datas = [
            'name' => $request->title,
            'subject' => $request->subject,
            'message' => $request->message,
            'pic' => $photoPath,
        ];
        $data = Testimonial::where(['id' => $request->id]);
        $res = $data->update($datas);
        if ($res) {
            $this->message('success', 'Testimonial Update Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }
    
    public function general(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        $find = Setting::where('id', 1)->first();
        return View('admin.setting.general', compact('find'));
    }
    
    public function generalsave(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        $find = Setting::where('id', 1)->first();
        if ($request->file('logo') == null || $request->file('logo') == '') {
            if ($find->logo == '' || $find->logo == null) {
                $photoPath = null;
            } else {
                $photoPath = $find->logo;
            }
        } else {
            $image = $request->file('logo');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/setting/';
            $photoPath = "images/setting/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
            File::delete($find->logo);
        }
        if ($request->file('wlogo') == null || $request->file('wlogo') == '') {
            if ($find->wlogo == '' || $find->wlogo == null) {
                $photoPath1 = null;
            } else {
                $photoPath1 = $find->wlogo;
            }
        } else {
            $image1 = $request->file('wlogo');
            $input1['imagename'] = time() . '.' . $image1->getClientOriginalExtension();
            $destinationPath1 = 'images/setting/';
            $photoPath1 = "images/setting/" . $input1['imagename'];
            $image1->move($destinationPath1, $input1['imagename']);
            File::delete($find->wlogo);
        }
        if ($request->file('favicon') == null || $request->file('favicon') == '') {
            if ($find->favicon == '' || $find->favicon == null) {
                $photoPath2 = null;
            } else {
                $photoPath2 = $find->favicon;
            }
        } else {
            $image2 = $request->file('favicon');
            $input2['imagename'] = time() . '.' . $image2->getClientOriginalExtension();
            $destinationPath2 = 'images/setting/';
            $photoPath2 = "images/setting/" . $input2['imagename'];
            $image2->move($destinationPath2, $input2['imagename']);
            File::delete($find->favicon);
        }
        $datas = [
            'app_name' => $request->app_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'facebook_id' => $request->facebook_id,
            'twitter_id' => $request->twitter_id,
            'instagram_id' => $request->instagram_id,
            'linkedin_id' => $request->linkedin_id,
            'youtube_id' => $request->youtube_id,
            'address' => $request->address,
            'logo' => $photoPath,
            'wlogo' => $photoPath1,
            'favicon' => $photoPath2
        ];
        $data = Setting::where(['id' => 1]);
        $res = $data->update($datas);
        if ($res) {
            $this->message('success', 'Saved Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }
    
    public function laws(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        return View('admin.setting.laws');
    }
    
    public function laws_table() {
        $res = Laws::orderBy('id', 'DESC')->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<button category_id='" . $value->id . "' class='btn btn-sm btn-default edit-laws' data-bs-toggle='modal' data-bs-target='#edit-laws'><i class='fa fa-edit'></i></button>"
                    . "<button category_id='" . $value->id . "' class='btn btn-sm btn-default delete_laws'><i class='fa fa-trash text-danger'></i></button>";
            $i++;
        }
        $this->message('success', '', $res);
    }
    
    public function create_laws(Request $request) {
        $co = Laws::where('slug', Str::slug($request->title, '-'))->count();
        if (Laws::where('slug', Str::slug($request->title, '-'))->count() > 0) {
            $slug = Str::slug($request->title, '-') . '-' . $this->generateRandomString(5);
        } else {
            $slug = Str::slug($request->title, '-');
        }
        $data = [
            'title' => $request->title,
            'slug' => $slug
        ];
        $res = Laws::create($data);

        if ($res) {
            $this->message('success', 'Laws Create Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function edit_laws(Request $request) {
        $datas = [
            'title' => $request->title
        ];
        $data = Laws::where(['id' => $request->id]);
        $res = $data->update($datas);
        if ($res) {
            $this->message('success', 'Laws Update Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }
    
    public function query(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        return View('admin.setting.query');
    }
    
    public function query_table() {
        $res = Query::orderBy('id', 'DESC')->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<button category_id='" . $value->id . "' class='btn btn-sm btn-default edit-query' data-bs-toggle='modal' data-bs-target='#edit-query'><i class='fa fa-edit'></i></button>"
                    . "<button category_id='" . $value->id . "' class='btn btn-sm btn-default delete_query'><i class='fa fa-trash text-danger'></i></button>";
            $i++;
        }
        $this->message('success', '', $res);
    }
    
    public function create_query(Request $request) {
        $co = Query::where('slug', Str::slug($request->title, '-'))->count();
        if (Query::where('slug', Str::slug($request->title, '-'))->count() > 0) {
            $slug = Str::slug($request->title, '-') . '-' . $this->generateRandomString(5);
        } else {
            $slug = Str::slug($request->title, '-');
        }
        $data = [
            'title' => $request->title,
            'slug' => $slug
        ];
        $res = Query::create($data);

        if ($res) {
            $this->message('success', 'Query Create Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function edit_query(Request $request) {
        $datas = [
            'title' => $request->title
        ];
        $data = Query::where(['id' => $request->id]);
        $res = $data->update($datas);
        if ($res) {
            $this->message('success', 'Query Update Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }
    
}

