<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class pagesController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }
    public function index()
    {
        return view('pages.index');
    }

    //redirect to register page
    public function register()
    {
        return view('pages.register');
    }

     //redirect to Login page
     public function login()
     {
         return view('pages.login');
     }

     public function Frontend()
     {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();
         return view('admin.frontend')->with(array('chat_users'=>$chat_users));

     }


}
