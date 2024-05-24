<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;

class postController extends Controller
{
 
 public function __construct()
 {
    $this->middleware('auth');
 }

function index(){
    $posts = Post::simplePaginate(5); // 5 items per page
    return view("posts.index", 
    [
        "posts"=>$posts
    ]);
}
function create(){
    return view("posts.create");
}
function store(StorePostRequest $request){
    // $post= new Post;
    // $post->title=$request->title;
    // $post->body=$request->body;
    // $post->save();

    //  $request->validate([
    //  "title"=>["required","unique:posts","min:3"],
    //  "body"=>"required|min:10"

    //  ],[
    //     "title.required"=>"erorrrrrrrrrr here in title ya haidy",
    //     "body.required"=>"erorrrrrrrrrr here in body ya haidy"

    //  ]);

    // another way 
    Post::create(
        [
            "title"=>$request->title,
            "body"=>$request->body,
            // "user_id"=>$request->user_id
            "user_id"=>Auth::id()


        ]
    );
return redirect("/posts");

}
function show($id){
    $post=Post::find($id);
//   Post::where('title',"title111")->get();
    return view("posts.show",["post"=>$post]);
}

function edit($id){
    $post=Post::find($id);

    return view("posts.edit",["post"=>$post]);
}


function update($id, Request $request){

        // Validate the request data
        $request->validate([
            "title" => ["required", "unique:posts,title," . $id, "min:3"],
            "body" => ["required", "min:3"],
        ]);
    // get data
    // update

    // Find the post by ID
    $post=Post::find($id);

    // Update post attributes
    $post->title=$request->title;
    $post->body=$request->body;
    $post->user_id=$request->user_id;
    
    // Save the updated post
    $post->save();
    
    // Redirect back to posts index page
    return redirect("/posts");
}


function destroy($id){
Post::destroy($id);
return redirect("/posts");

}


}
