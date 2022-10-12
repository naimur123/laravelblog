<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    protected $redirectTo;
    protected $logout;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct()
    {
        // $this->middleware('auth:admin');
        $this->redirectTo = route("admin.home");
        $this->logout = route("admin.login");
    }

    // Show Login Form
    public function showloginform(Request $request){
        if( Auth::guard('admin')->check() ){
            return redirect($this->redirectTo);
        }
        return view('admin.auth.login');
    }

    protected function guard()
    {
       
        return Auth::guard('admin');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username()   => 'required|string',
            'password'          => 'required|string|min:3',
        ]);
    }

    /**
     * After Logout the redirect location
     */
    protected function loggedOut(){
        Session::flush();
        return redirect($this->logout) ?: redirect()->back();
    }

    // After Login Dashboard
    public function dashboard(Request $request){
        
        $adminname = $request->user()->name;
        $adminid = $request->user()->id;
        Session::put('adminname',$adminname);
        Session::put('adminid',$adminid);
        $posts = Post::OrderBy('id',"ASC")->paginate(3);
        $params= [
          "posts" => $posts
        ];
        return view('admin.home',$params);
    }
    public function username(){
        return 'name';
    }
}
