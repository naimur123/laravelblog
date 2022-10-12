<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // comment store
    public function store(Request $request){
          try{
            $comment = new Comment();
            $comment->user_id = $request->user()->id;
            $comment->post_id = $request->id;
            $comment->comment = $request->comment;
            $comment->save();
            return back()->with("success", "Commented successfully");


          }catch(Exception $e){
            return back()->with("error", "Something went Wrong");
          }
    }

    // comment hide
    public function hide(Request $request){
        $hide = Comment::find($request->id);
        $hide->delete();
        return redirect()->back();
    }
}
