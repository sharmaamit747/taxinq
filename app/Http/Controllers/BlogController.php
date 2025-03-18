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
use App\BlogCategory;
use App\BlogTag;
use App\Blog;

class BlogController extends Controller {

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
    
    public function delete_record(Request $request) {
            $list = $request->table::find($request->id);
            $res = $list->delete();
            if ($res) {
                $this->message('success', 'Delete Successfully', '');
            } else {
                $this->message('error', 'Some Problem!', '');
            }
    }

    public function blog_categories(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        return View('admin.blog.blogcategory');
    }

    public function blog_tags(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        return View('admin.blog.blogtags');
    }

    public function blog(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        $cat = BlogCategory::get();
        return View('admin.blog.blogs', compact('cat'));
    }

    public function create_blog(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        $tag = BlogTag::get();
        $cat = BlogCategory::get();
        return View('admin.blog.blogsadd', compact('cat', 'tag'));
    }

    public function edit_blog(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        $res = DB::table('blogs')
                ->leftJoin('blog_categories as bcat', 'blogs.category_id', '=', 'bcat.id')
                ->select('blogs.*', 'bcat.title as category')
                ->where('blogs.id', $request->id)
                ->orderBy('blogs.id', 'DESC')
                ->first();
        $tag = BlogTag::get();
        $cat = BlogCategory::get();
        return View('admin.blog.blog_edit', compact('cat', 'tag', 'res'));
    }

    public function create_blogcategory(Request $request) {
        if ($request->file('file') == null) {
            $photoPath = null;
        } else {
            $image = $request->file('file');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/category/';
            $photoPath = "images/category/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
        }
        $co = BlogCategory::where('slug', Str::slug($request->title, '-'))->count();
        if (BlogCategory::where('slug', Str::slug($request->title, '-'))->count() > 0) {
            $slug = Str::slug($request->title, '-') . '-' . $this->generateRandomString(5);
        } else {
            $slug = Str::slug($request->title, '-');
        }
        $data = [
            'title' => $request->title,
            'slug' => $slug,
            'pic' => $photoPath,
        ];
        $res = BlogCategory::create($data);

        if ($res) {
            $this->message('success', 'Category Create Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function edit_blogcategory(Request $request) {
        $user = BlogCategory::find($request->id);
        $beforeUpdateValues = $user->toArray();
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
            $destinationPath = 'images/category/';
            $photoPath = "images/category/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
            File::delete($request->old);
        }
        $datas = [
            'title' => $request->title,
            'pic' => $photoPath,
        ];
        $data = BlogCategory::where(['id' => $request->id]);
        $res = $data->update($datas);
        if ($res) {
            $afterUpdateValues = BlogCategory::find($request->id)->toArray();
            $text = 'Product Category Update ';
//                $this->logUpdatedActivity($user, $beforeUpdateValues, $afterUpdateValues, $text);
            $this->message('success', 'Blog Category Update Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function create_blogtag(Request $request) {

        $data = [
            'tag' => $request->tag,
        ];
        $res = BlogTag::create($data);
        if ($res) {
            $this->message('success', 'Tag Create Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function edit_blogtag(Request $request) {

        $datas = [
            'tag' => $request->tag,
        ];
        $data = BlogTag::where(['id' => $request->id]);
        $res = $data->update($datas);
        if ($res) {
            $this->message('success', 'Blog Tag Update Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function create_blogss(Request $request) {
        if ($request->file('file') == null) {
            $photoPath = null;
        } else {
            $image = $request->file('file');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/blog/';
            $photoPath = "images/blog/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
        }
        $co = Blog::where('slug', Str::slug($request->btitle, '-'))->count();
        if (Blog::where('slug', Str::slug($request->btitle, '-'))->count() > 0) {
            $slug = Str::slug($request->btitle, '-') . '-' . $this->generateRandomString(500);
        } else {
            $slug = Str::slug($request->btitle, '-');
        }
        $data = [
            'category_id' => $request->bcategory,
            'tag_id' => implode(',', $request->btag),
            'title' => $request->btitle,
            'content' => $request->blogg,
            'slug' => $slug,
            'author' => $request->author,
            'pic' => $photoPath,
        ];
        $res = Blog::create($data);

        if ($res) {
            $this->message('success', 'Blog Create Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }
    
    public function edit_blogss(Request $request) {
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
            $destinationPath = 'images/blog/';
            $photoPath = "images/blog/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
            File::delete($request->old);
        }
        $datas = [
            'category_id' => $request->bcategory,
            'tag_id' => implode(',', $request->tags),
            'title' => $request->btitle,
            'content' => $request->blogg,
            'author' => $request->author,
            'pic' => $photoPath,
        ];
        $data = Blog::where(['id' => $request->id]);
        $res = $data->update($datas);
        if ($res) {
            $this->message('success', 'Blog Create Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function blogcategory_table() {
        $res = BlogCategory::orderBy('id', 'DESC')->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<button category_id='" . $value->id . "' class='btn btn-sm btn-default edit-blogcategory' data-bs-toggle='modal' data-bs-target='#edit-blogcategory'><i class='fa fa-edit'></i></button>"
                    . "<button category_id='" . $value->id . "' class='btn btn-sm btn-default delete_blogcategory'><i class='fa fa-trash text-danger'></i></button>";
            $i++;
        }
        $this->message('success', '', $res);
    }

    public function blogtag_table() {
        $res = BlogTag::orderBy('id', 'DESC')->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<button tag_id='" . $value->id . "' class='btn btn-sm btn-default edit-blogtag' data-bs-toggle='modal' data-bs-target='#edit-blogtag'><i class='fa fa-edit'></i></button>"
                    . "<button tag_id='" . $value->id . "' class='btn btn-sm btn-default delete_blogtag'><i class='fa fa-trash text-danger'></i></button>";
            $i++;
        }
        $this->message('success', '', $res);
    }

    public function blog_table() {
        $res = DB::table('blogs')
                ->leftJoin('blog_categories as bcat', 'blogs.category_id', '=', 'bcat.id')
                ->select('blogs.*', 'bcat.title as category')
                ->orderBy('blogs.id', 'DESC')
                ->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<a href='edit_blog/" . $value->id . "' class='btn btn-sm btn-default'><i class='fa fa-edit'></i></button>"
                    . "<a tag_id='" . $value->id . "' class='btn btn-sm btn-default delete_blog'><i class='fa fa-trash text-danger'></i></button>";
            $i++;
        }
        $this->message('success', '', $res);
    }

}
