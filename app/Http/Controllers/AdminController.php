<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\posts;
use App\Models\User;
use App\Models\categories;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index($type = null)
    {
        return view('admin.admin', ['page_title' => 'admin Dashboard']);
    }

    public function posts(Request $req, $type = null, $id = '')
    {

        switch ($type) {

            case 'add':  ///////////////////// case add

                if ($req->method() == 'POST') {

                    $req->validate([
                        'title' => 'required',
                        'file' => 'required|file',
                        'category' => 'required',
                        'content' => 'required',
                    ]);

                    $path = $req->file('file')->store('uploads');

                    $post = new posts();
                    $post::insert([
                        'title' => $req->title,
                        'category_id' => $req->category,
                        'content' => $req->content,
                        'image' => $path,
                        'created_at' => date("y-m-d H-m-s"),

                    ]);
                    return redirect("admin/posts");
                }


                $arr['page_title'] = 'new post';
                $arr['categories'] = categories::all();
                return view('admin.addpost', $arr);

                break;       ///////////////////////// end add post




            case 'edit':  //////////////// case update

                $post = posts::find($id);
                $arr['post'] = $post;
                $arr['categories'] = categories::all();
                $arr['page_title'] = 'edit post';

                if ($req->method() == 'POST') {

                    $req->validate([
                        'title' => 'required',
                        'category' => 'required',
                        'content' => 'required',
                    ]);

                    if ($req->file('file')) {
                        if (file_exists($post->image)) {
                            unlink($post->image);
                        }
                        $path = $req->file('file')->store('uploads');
                        $data['image'] = $path;
                    }

                    $data['title'] = $req->input('title');
                    $data['category_id'] = $req->input('category');
                    $data['content'] = $req->input('content');
                    $data['updated_at'] = date('y-m-d H-m-s');

                    $post::where('id', $id)->update($data);

                    $posts = posts::all();
                    $arr['posts'] = $posts;
                    $arr['page_title'] = 'posts';
                    return view('admin/posts', $arr);
                }


                return view('admin.editpost', $arr);

                break;        ///////////////////// end edit

            case 'delete':  ////////////// case delete


                $post = posts::find($id);
                $arr['post'] = $post;
                $arr['page_title'] = 'delete';


                if ($req->method() == 'POST') {
                    posts::find($id)->delete();
                    if (file_exists($post->image)) {
                        unlink($post->image);
                    }
                    return redirect("admin/posts");
                }

                return view("admin.deletepost", $arr);
                ///////////////////// end case delete
                break;
        }

        $posts = posts::all();
        $arr['posts'] = $posts;
        $arr['page_title'] = 'posts';

        return view("admin.posts", $arr);
    }

    public function categories(Request $req, $type = "", $id = '')
    {


        switch ($type) {

            case 'add':  ///////////////////// case add

                if ($req->method() == 'POST') {

                    $req->validate([
                        'category' => 'required|string',
                    ]);

                    $category = new categories();
                    $category::insert([
                        'category' => $req->input("category"),
                        'created_at' => date("y-m-d H-m-s"),
                        'updated_at' => date("y-m-d H-m-s"),
                    ]);

                    return redirect("admin/categories");
                }


                $arr['page_title'] = 'new category';
                $arr['categories'] = categories::all();
                return view('admin.addcategory', $arr);

                break;       ///////////////////////// end add post


            case 'edit':  //////////////// case update

                $category = categories::find($id);
                $arr['category'] = $category;
                $arr['page_title'] = 'edit post';

                if ($req->method() == 'POST') {

                    $req->validate([
                        'category' => 'required|string',
                    ]);



                    $category->category = $req->input("category");
                    $category->updated_at = date("y-m-d ");
                    $category->save();




                    $arr['categories'] = categories::all();
                    $arr['page_title'] = 'categories';
                    return view('admin/categories', $arr);
                }


                return view('admin.editcategory', $arr);

                break;        ///////////////////// end edit

            case 'delete':  ////////////// case delete


                $category = categories::find($id);
                $arr['category'] = $category;
                $arr['page_title'] = 'delete category';


                if ($req->method() == 'POST') {
                    categories::find($id)->delete();
                    return redirect("admin/categories");
                }

                return view("admin.deletecategory", $arr);
                ///////////////////// end case delete
                break;

            default:

                $categories = categories::all();
                $arr['categories'] = $categories;
                $arr['page_title'] = 'categories';

                return view("admin.categories", $arr);
        }
    }

    public function users(Request $req, $type='',$id='')
    {

        switch ($type) {

            case 'add':  ///////////////////// case add

                return redirect("register");

                break;       ///////////////////////// end add post


            case 'edit':  //////////////// case update

                $user = User::find($id);
                $arr['user'] = $user;
                $arr['page_title'] = 'edit user';

                if ($req->method() == 'POST') {

                    $req->validate([
                        'name' => 'required',
                        'email' => 'email',
                    ]);

                    $user->name = $req->input("name");
                    $user->email = $req->input("email");
                    if($req->input("password")){

                        $user->password =$req->input("password");
                    }

                    // $user->updated_at = date("y-m-d H-m-s");
                    $user->save();

                    $arr['users'] = User::all();
                    $arr['page_title'] = 'categories';
                    return view('admin/users', $arr);
                }


                return view('admin.edituser', $arr);

                break;        ///////////////////// end edit

            case 'delete':  ////////////// case delete


                $user = User::find($id);
                $arr['user'] = $user;
                $arr['page_title'] = 'delete category';


                if ($req->method() == 'POST') {
                    AuthUser::find($id)->delete();
                    return redirect("admin/users");
                }

                return view("admin.deleteuser", $arr);
                ///////////////////// end case delete
                break;

            default:

                $users = User::all();
                $arr['users'] = $users;
                $arr['page_title'] = 'Users';

                return view("admin.users", $arr);
        }
    }
}
