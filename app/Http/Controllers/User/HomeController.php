<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // all post
    public function index(){
        $all = Post::orderBy('id','ASC')->paginate(3);
        // $all->paginate(5);
        $params=[
           'title'=> "All post page",
           'alls' => $all
        ];
        return view('main',$params);
    }
}
