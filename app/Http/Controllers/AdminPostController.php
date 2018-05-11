<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostCreateRequest;
use App\User;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use App\Category;
use Illuminate\Support\Facades\Session;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::pluck("name", "id")->all();
        $categories = Category::Pluck("category_name", "id")->all();

        return view("admin.posts.new", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        //post hs users so we need to pull out the current user
        $input = $request->all();
        $user = Auth::user();
        $input["user_id"] = $user->id; //current user and user id
        
        if($file = $request->file("photo_id")){

            $name = time().$file->getClientOriginalName();
            $file->move("images", $name);
            $photo = Photo::create(["file_path" => $name ]);

            $input["photo_id"] = $photo->id;

        }
        Post::create($input);
        Session::flash("inserted_post" , "New Post is succesfully created");
        return redirect(route("posts.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view("admin.posts.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
