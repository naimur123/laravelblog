<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // post hide
    public function hide(Request $request){
        $hide = Post::find($request->id);
        $comment = Comment::where('post_id',$request->id)->delete();
        // $comment->delete();
        $hide->delete();

        return redirect()->back();
    }
}
