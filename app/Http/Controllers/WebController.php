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

class WebController extends Controller {

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

    public function index(Request $request) {
        $blog = DB::table('blogs')
                ->leftJoin('blog_categories', 'blogs.category_id', '=', 'blog_categories.slug')
                ->select('blogs.*', 'blog_categories.title as catName')
                ->orderby('blogs.id', 'DESC')
                ->limit(3)
                ->get();
        $i = 1;
        foreach ($blog as $key => &$value) {
            $value->con = str_limit($value->content);
            $value->dates = date("d M Y", strtotime($value->created_at));
            $value->count = Comment::where('blog_id', $value->id)->where('type', 'blog')->count();
        }
        $testimonial = DB::table('testimonials')
                ->select('testimonials.*')
                ->orderby('testimonials.id', 'DESC')
                ->limit(10)
                ->get();
        $client = DB::table('clients')
                ->select('clients.*')
                ->orderby('clients.id', 'DESC')
                ->limit(12)
                ->get();
        $slider = Slider::all();
        $consultant = User::where('userType', 2)->limit(4)->get();
        $news = DB::table('news')
                ->select('news.*')
                ->orderby('news.id', 'DESC')
                ->limit(10)
                ->get();
        $i = 1;
        foreach ($news as $key => &$value) {
            $value->con = str_limit($value->content);
            $value->dates = date("d M Y", strtotime($value->created_at));
        }
        return View('web.welcome', compact('blog', 'testimonial', 'client', 'slider', 'consultant', 'news'));
    }

    public function contact(Request $request) {
        return View('web.contact');
    }

    public function contact_submit(Request $request) {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];
        $res = Contact::create($data);
        if ($res) {
            $this->message('success', 'Form Submitted Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function book_appointment(Request $request) {
        $query = Query::get();
        $laws = Laws::get();
        return View('web.book_appointment', compact('query', 'laws'));
    }

    function generateRandomString($length = 30) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function generateRandomString2($length = 8) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function appoitment_book(Request $request) {
        if ($request->file('file') == null) {
            $photoPath = null;
        } else {
            $image = $request->file('file');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/appointment/';
            $photoPath = "images/appointment/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
        }
        $data = [
            'your_name' => $request->your_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'query_id' => $request->query_id,
            'law_id' => $request->law_id,
            'slug' => $this->generateRandomString2(8),
            'extra1' => $photoPath,
            'message' => $request->message
        ];
        $res = Appointment::create($data);
        $email = User::where('email', $request->email)->count();
        if ($email < 1) {
            User::create([
                'userType' => 3,
                'name' => $request->your_name,
                'email' => $request->email,
                'extra1' => $request->mobile,
                'password' => Hash::make($request->mobile)
            ]);
            $data23 = [
                'subject' => 'TaxinQ Recieved Your Appointment Request Successfully',
                'email' => $request->email,
                'uname' => $request->your_name,
                'cre' => 'Thank you for submitting Appointment Request, We will contact you ASAP. Login in your TaxinQ Account with your registered Email(' . $request->email . ') as Username and registered mobile(' . $request->mobile . ') as Password.'
            ];
        } else {
            $data23 = [
                'subject' => 'TaxinQ Recieved Your Appointment Request Successfully',
                'email' => $request->email,
                'uname' => $request->your_name,
                'cre' => 'Thank you for submitting Appointment Request, We will contact you ASAP.'
            ];
        }
//        $res23 = Mail::to($request->email)->send(new AppointmentMail($data23));
        if (Auth::user() == null) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->mobile])) {
                return redirect()->back()->with('message', 'Appointment Request Submitted Successfully, we reply soon.');
            }
        } else {
            return redirect()->back()->with('message', 'Appointment Request Submitted Successfully, we reply soon.');
        }
    }

    public function blogs(Request $request) {
        $blog = DB::table('blogs')
                ->leftJoin('blog_categories', 'blogs.category_id', '=', 'blog_categories.slug')
                ->select('blogs.*', 'blog_categories.title as catName')
                ->orderby('blogs.id', 'DESC')
                ->paginate(12);
        foreach ($blog as $key => &$value) {
            $value->con = str_limit($value->content);
            $value->dates = date("d M Y", strtotime($value->created_at));
            $value->count = Comment::where('blog_id', $value->id)->where('type', 'blog')->count();
        }
        return View('web.blogs', compact('blog'));
    }
    
    public function news(Request $request) {
        $news = DB::table('news')
                ->select('news.*',)
                ->orderby('news.id', 'DESC')
                ->paginate(12);
        foreach ($news as $key => &$value) {
            $value->con = str_limit($value->content);
            $value->dates = date("d M Y", strtotime($value->created_at));
            $value->count = Comment::where('blog_id', $value->id)->where('type', 'news')->count();
        }
        return View('web.news', compact('news'));
    }
    
    public function news_single(Request $request) {
        $news = DB::table('news')
                ->select('news.*')
                ->where('news.slug', $request->id)
                ->first();
        $news->dates = date("d M Y", strtotime($news->created_at));
        $news->tag = explode(',', $news->tags);
        $comment = Comment::where('blog_id', $news->id)->where('type', 'news')->orderby('id', 'DESC')->get();
        foreach ($comment as $key => &$val) {
            $val->dates = date("d M Y", strtotime($val->created_at));
        }
        $ccount = Comment::where('blog_id', $news->id)->where('type', 'news')->count();
        $news1 = DB::table('news')
                ->select('news.*')
                ->orderby('news.id', 'DESC')
                ->limit(8)
                ->get();
        foreach ($news1 as $key => &$value) {
            $value->con = str_limit($value->content);
            $value->dates = date("d M Y", strtotime($value->created_at));
        }
        return View('web.news_single', compact('news', 'comment', 'ccount', 'news1'));
    }

    public function blog(Request $request) {
        $blog = DB::table('blogs')
                ->leftJoin('blog_categories', 'blogs.category_id', '=', 'blog_categories.slug')
                ->select('blogs.*', 'blog_categories.title as catName')
                ->where('blogs.slug', $request->id)
                ->first();
        $blog->con = str_limit($blog->content);
        $blog->dates = date("d M Y", strtotime($blog->created_at));
        $blog->tags = explode(',', $blog->tag_id);
        $comment = Comment::where('blog_id', $blog->id)->where('type', 'blog')->orderby('id', 'DESC')->get();
        foreach ($comment as $key => &$val) {
            $val->dates = date("d M Y", strtotime($val->created_at));
        }
        $ccount = Comment::where('blog_id', $blog->id)->where('type', 'blog')->count();
        $blog1 = DB::table('blogs')
                ->leftJoin('blog_categories', 'blogs.category_id', '=', 'blog_categories.slug')
                ->select('blogs.*', 'blog_categories.title as catName')
                ->orderby('blogs.id', 'DESC')
                ->limit(8)
                ->get();
        foreach ($blog1 as $key => &$value) {
            $value->con = str_limit($value->content);
            $value->dates = date("d M Y", strtotime($value->created_at));
        }
        $category = BlogCategory::get();
        foreach ($category as $key => &$value) {
            $value->totalcat = Blog::where('category_id', $value->id)->count();
        }
        $tag = Blogtag::get();
        return View('web.blog', compact('blog', 'comment', 'ccount', 'blog1', 'category', 'tag'));
    }

    public function add_comment(Request $request) {
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

    public function blog_category(Request $request) {
        $cat = BlogCategory::where('slug', $request->id)->first();
        $blog = DB::table('blogs')
                ->leftJoin('blog_categories', 'blogs.category_id', '=', 'blog_categories.slug')
                ->select('blogs.*', 'blog_categories.title as catName')
                ->where('blogs.category_id', $cat->id)
                ->orderby('blogs.id', 'DESC')
                ->paginate(12);
        foreach ($blog as $key => &$value) {
            $value->con = str_limit($value->content);
            $value->dates = date("d M Y", strtotime($value->created_at));
            $value->count = Comment::where('blog_id', $value->id)->count();
        }
        return View('web.blog_category', compact('blog', 'cat'));
    }

    public function blog_tag(Request $request) {
        $tag = Blogtag::where('tag', $request->id)->first();
        $ttag = $tag->tag;
        $blog = DB::table('blogs')
                ->leftJoin('blog_categories', 'blogs.category_id', '=', 'blog_categories.slug')
                ->select('blogs.*', 'blog_categories.title as catName')
                ->whereRaw('FIND_IN_SET(?, blogs.tag_id)', [$ttag])
                ->orderby('blogs.id', 'DESC')
                ->paginate(12);
        foreach ($blog as $key => &$value) {
            $value->con = str_limit($value->content);
            $value->dates = date("d M Y", strtotime($value->created_at));
            $value->count = Comment::where('blog_id', $value->id)->count();
        }
        return View('web.blog_tag', compact('blog', 'tag'));
    }

    public function services(Request $request) {

        return View('web.services.services');
    }

    public function gst(Request $request) {

        return View('web.services.gst');
    }

    public function customs(Request $request) {

        return View('web.services.customs');
    }

    public function incometax(Request $request) {

        return View('web.services.incometax');
    }

    public function corporationtax(Request $request) {

        return View('web.services.corporationtax');
    }

    public function pfesi(Request $request) {

        return View('web.services.pfesi');
    }

    public function laborlaw(Request $request) {

        return View('web.services.laborlaw');
    }

    public function profile_pic_update(Request $request) {
        if ($request->file('file') == null) {
            $photoPath = null;
        } else {
            $image = $request->file('file');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/profile/';
            $photoPath = "images/profile/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
        }
        $datas = [
            'pic' => $photoPath,
        ];
        $data = User::where(['id' => Auth::user()->id]);
        $res = $data->update($datas);
        if ($res) {
            $this->message('success', 'Profile Picture Update Successfully', $photoPath);
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function profile_intro_update(Request $request) {
        $datas = [
            'name' => $request->name,
            'extra1' => $request->phone,
            'extra2' => $request->birthday,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'about' => $request->about,
            'title' => $request->title
        ];
        $data = User::where(['id' => Auth::user()->id]);
        $res = $data->update($datas);
        if ($res) {
            $this->message('success', 'Profile Intro Update Successfully', $res);
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function profile_edu_update(Request $request) {
        $post = $_POST['group-address'];
        foreach ($post as $key => $subValue) {
            if ($subValue['id'] == '' || $subValue['id'] == null) {
                $data = [
                    'school' => $subValue['school'],
                    'degree' => $subValue['degree'],
                    'fos' => $subValue['fos'],
                    'year' => $subValue['year'],
                    'userid' => Auth::user()->id,
                ];
                $res = Education::create($data);
            } else {
                $data = [
                    'school' => $subValue['school'],
                    'degree' => $subValue['degree'],
                    'fos' => $subValue['fos'],
                    'year' => $subValue['year'],
                    'userid' => Auth::user()->id,
                ];
                $datas = Education::where(['id' => $subValue['id']]);
                $res = $datas->update($data);
            }
        }
        if ($res) {
            $this->message('success', 'Education Update Successfully', $res);
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function pass_update(Request $request) {
        if ($request->password != $request->password_confirmation) {
            $this->message('error', 'Password is not confirmed.', '');
        } else {
            $data = [
                'password' => Hash::make($request->password)
            ];
            $datas = User::where(['id' => Auth::user()->id]);
            $res = $datas->update($data);
            if ($res) {
                $this->message('success', 'Password Update Successfully', $res);
            } else {
                $this->message('error', 'Some Problem!', '');
            }
        }
    }

}
