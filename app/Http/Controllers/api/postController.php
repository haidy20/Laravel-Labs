<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
// use App\Http\Requests\update;


use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValueMap;

class postController extends Controller
{
    function index(){
        $posts = Post::all();// 5 items per page
            // return $posts;
            return PostResource::collection($posts);
    }

function store(StorePostRequest $request){

    Post::create(
        [
            "title"=>$request->title,
            "body"=>$request->body,
            "user_id"=>$request->user_id


        ]
    );
return "Post Stored";

}

function show($id){
    $post=Post::find($id);
//   Post::where('title',"title111")->get();
    // return $post;
    return new PostController($post);
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
return "Data has been updated";

}

function destroy($id){
    Post::destroy($id);
    return "Data has been deleted";
    
    }

}