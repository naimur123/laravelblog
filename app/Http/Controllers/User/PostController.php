<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // post add index
    public function index(){
        $params=[

            "title"=> "Post create",
            "form_url"=> route('post.store')
        
        ];
        return view('post.create',$params);
    }

    // post store
    public function store(Request $request){
             try{
                // dd($request);
                // dd($request->user()->id);
                if($request->id == 0){
                    $post = new Post();
                    $post->user_id = $request->user()->id;
                }
                else{
                    $post = Post::find($request->id);
                    $post->user_id = $post->user_id;
                }

                $post->title = $request->title;
                $post->body = $request->body;
                $post->save();

                return back()->with("success", $request->id == 0 ? "Post created successfully" : "Post updated successfully");

             }catch(Exception $e){
                return back()->with("error", "Something went Wrong");
             }
    }

    // post show
    public function show(Request $request){
           
        $post = Post::find($request->id);
        $comments = Comment::where('post_id',$request->id)->get();
        
        $params = [
            "title" => "Post Details",
            "post" => $post,
            "comments" => $comments

        ];
        return view('post.show',$params);
    }

    // post edit
    public function update(Request $request, $id){
        $data = Post::find($id);
        $params=[

            "title"=> "Post edit",
            "data" => $data,
            "form_url"=> route('post.store')
        ];
        return view('post.create',$params);
    }
}
