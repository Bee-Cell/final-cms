<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests\UserRequest;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  List of Blogs
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //new
    public function create()
    {
        //  Show new blog form
        //returns list of items from the database id whould be secondd parameters.

        //roles to pass the roles from database
        $roles = Role::pluck("name", "id")->all();
        return view('admin.users.new', compact("roles"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //Create the New blog from the form and redirects somewhere
        // return $request->all(); // the see the post value from subbmiit

       $input = $request->all();

        //cehck file pull out name and append with time and move to tje image location
        if($file = $request->file("photo_id")){
            $name = time().$file->getClientOriginalName();
            $file->move("images", $name);
            $photo = Photo::create(["file_path" => $name ]);

            $input["photo_id"] = $photo->id;
        }
        $input["password"] = bcrypt($request->password);
        User::create($input);

       // return redirect(route("users.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Show info about a single blog
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //show the form with particular blog with old value
        return view('admin.users.edit');
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
        //Update form with new value; update the particularblog and then redirect somewhere
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete the particular blog
    }
}
