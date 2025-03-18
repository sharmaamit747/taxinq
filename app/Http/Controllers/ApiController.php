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
use App\Blog;
use App\User;
use App\Contact;
use App\Query;
use App\Laws;
use App\News;
use App\Education;
use App\Appointment;
use App\Comment;
use App\BlogCategory;
use App\BlogTag;
use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller {

    public function message($type, $msg, $data = null) {
        $this->data['type'] = $type;
        $this->data['message'] = $msg;
        $this->data['data'] = $data;
        echo json_encode($this->data);
    }

    function str_limit($value, $limit = 100, $end = '...') {
        $limit = $limit - mb_strlen($end); // Take into account $end string into the limit
        $valuelen = mb_strlen($value);
        return $limit < $valuelen ? mb_substr($value, 0, mb_strrpos($value, ' ', $limit - $valuelen)) . $end : $value;
    }
    
    public function news_list(Request $request) {
        $res = DB::table('news')
                ->select('news.*')
                ->orderby('news.id', 'DESC')
                ->get();
        foreach ($res as $key => &$value) {
            $value->con = str_limit($value->content);
            $value->dates = date("d M Y", strtotime($value->created_at));
            $value->count = Comment::where('blog_id', $value->id)->where('type', 'news')->count();
        }
        if ($res->count() > 0) {
            $this->message('success', 'Data Found', $res);
        } else {
            $this->message('error', 'Data Not Found!', '');
        }
    }
    
    public function news(Request $request) {
        $news = DB::table('news')
                ->select('news.*')
                ->where('news.id', $request->id)
                ->first();
        $news->dates = date("d M Y", strtotime($news->created_at));
        $news->tag = explode(',', $news->tags);
        if ($news) {
            $this->message('success', 'Data Found', $news);
        } else {
            $this->message('error', 'Data Not Found!', '');
        }
    }
    
    public function comments(Request $request) {
        $res = Comment::where('blog_id', $request->id)->where('type', $request->type)->get();
        foreach ($res as $key => &$value) {
            $value->dates = date("d M Y", strtotime($value->created_at));
        }
        if($res->count() > 0){
            $this->message('success', 'Data Found', $res);
        } else {
            $this->message('error', 'Data Not Found!', '');
        }
    }
    
    public function post_comment(Request $request) {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'blog_id' => $request->blog_id,
            'type' => $request->type,
            'message' => $request->message
        ];
        $res = Comment::create($data);
        $res->dates = date("d M Y", strtotime($res->created_at));
        if ($res) {
            $this->message('success', 'Comment Submitted Successfully', $res);
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }
    
    public function blog_list(Request $request) {
        $res = DB::table('blogs')
                ->leftJoin('blog_categories', 'blogs.category_id', '=', 'blog_categories.slug')
                ->select('blogs.*', 'blog_categories.title as catName')
                ->orderby('blogs.id', 'DESC')
                ->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sort_con = str_limit($value->content);
            $value->dates = date("d M Y", strtotime($value->created_at));
            $value->comment_count = Comment::where('blog_id', $value->id)->where('type', 'blog')->count();
        }
        if ($res->count() > 0) {
            $this->message('success', 'Data Found', $res);
        } else {
            $this->message('error', 'Data Not Found!', '');
        }
    }
    
    public function blog_detail(Request $request) {
        $blog = DB::table('blogs')
                ->leftJoin('blog_categories', 'blogs.category_id', '=', 'blog_categories.slug')
                ->select('blogs.*', 'blog_categories.title as catName')
                ->where('blogs.id', $request->id)
                ->first();
        $blog->con = str_limit($blog->content);
        $blog->dates = date("d M Y", strtotime($blog->created_at));
        $blog->tags = explode(',', $blog->tag_id);
        if ($blog) {
            $this->message('success', 'Data Found', $blog);
        } else {
            $this->message('error', 'Data Not Found!', '');
        }
    }

    
}

?>