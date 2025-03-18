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
use App\News;

class NewsController extends Controller {

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
    
    public function retrieve(Request $request) {
        $res = DB::table($request->table)->where($request->key, $request->id)->orderBy('id', 'ASC')->get();
        if ($res) {
            $this->message('success', 'Data Found', $res);
        } else {
            $this->message('error', 'Data Not Found!', '');
        }
    }
    
    public function news(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        return View('admin.news.news');
    }
    
    public function create_news(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        return View('admin.news.create_news');
    }
    
    public function edit_news(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        $res = DB::table('news')
                ->select('news.*')
                ->where('news.id', $request->id)
                ->orderBy('news.id', 'DESC')
                ->first();
        return View('admin.news.edit_news', compact('res'));
    }
    
    public function news_table() {
        $res = DB::table('news')
                ->select('news.*')
                ->orderBy('news.id', 'DESC')
                ->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<a href='edit_news/" . $value->id . "' class='btn btn-sm btn-default'><i class='fa fa-edit'></i></button>"
                    . "<a tid='" . $value->id . "' class='btn btn-sm btn-default delete_news'><i class='fa fa-trash text-danger'></i></button>";
            $i++;
        }
        $this->message('success', '', $res);
    }
    
    public function add_news(Request $request) {
        if ($request->file('file') == null) {
            $photoPath = null;
        } else {
            $image = $request->file('file');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/news/';
            $photoPath = "images/news/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
        }
        $co = News::where('slug', Str::slug($request->title, '-'))->count();
        if (News::where('slug', Str::slug($request->title, '-'))->count() > 0) {
            $slug = Str::slug($request->title, '-') . '-' . $this->generateRandomString(500);
        } else {
            $slug = Str::slug($request->title, '-');
        }
        $data = [
            'tags' => implode(',', $request->tags),
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'author' => $request->author,
            'pic' => $photoPath,
        ];
        $res = News::create($data);

        if ($res) {
            $this->message('success', 'News Create Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }
    
    public function edit_newss(Request $request) {
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
            $destinationPath = 'images/news/';
            $photoPath = "images/news/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
            File::delete($request->old);
        }
        $datas = [
            'tags' => implode(',', $request->tags),
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'pic' => $photoPath,
        ];
        $data = News::where(['id' => $request->id]);
        $res = $data->update($datas);
        if ($res) {
            $this->message('success', 'News Edit Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }
    
    
}
