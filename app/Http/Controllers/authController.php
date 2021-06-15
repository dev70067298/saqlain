<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\User;
class authController extends Controller
{
  //Register Account
    public function signup(Request $request)
    {
        if(isset($request->submit))
        {
            $this->validate($request,[
                'name'=>'required',
                'user'=>'required|unique:users,user',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:4|same:Repeat-password',
                'type'=>'required',
                'term' =>'accepted',
                'cnic' =>'required',
                'address' =>'required'
            ]);

          $user=new User;
          $user->name=$request->name;
          $user->user=$request->user;
          $user->email=$request->email;
          $user->cnic=$request->cnic;
          $user->address=$request->address;
          $user->password=bcrypt($request->password);
          $user->userRole=$request->type;
          if($request->type == 2)
          {
              $status='Buyer';
              $user->status=1;
          }
          if($request->type == 3)
          {
              $status='Researcher';
              $user->status=0;
              $user->credit=0;
          }
          if(isset($request->file))
          {
              $this->validate($request,[
                'file' =>'required',
              ]);
          $path1=$user->file;
          Storage::delete($path1);
          if ($request->file('file') == null) {
            $path = "";
        }else{
          $path=$request->file('file')->store('image/file');
        }
          }
          //$user->file=$path;
          $user->save();
          if($user->save())
          {
            return redirect()->back()->with('success','Your Are Registered Successfully as '.$status);
          }
          else
          {
            return redirect()->back()->with('error','Your Are Not Registered');
          }
        }
    }


    //Admin Login

    public function admin_login(Request $request)
    {
      if (Auth::check()) {
        if(Auth::user()->userRole == 1)
        {
         return redirect('/dashboard');
        }
     }
     if(isset($request->user) && isset($request->password))
     {
         $credentials = $request->only('user', 'password');

         if (Auth::attempt($credentials)) {
             $user = Auth::user();
             if($user->status == 1 && $user->userRole == 1)
             {
                 return redirect('/dashboard');
             }
            else
             {
                 Auth::logout();
                 if($user->userRole != 1)
                 {
                     return redirect()->back()->with('error', 'Wrong Credantials');
                 }

                 if($user->status == 0)
                 {
                     return redirect()->back()->with('error', 'Your Account is under review');
                 }
                 else if($user->status == 2)
                 {
                     return redirect()->back()->with('error', 'Your Account Rejected');
                 }
                 else if($user->status == 3)
                 {
                     return redirect()->back()->with('error', 'Your Account Deleted');
                 }
             }
         }
         else
         {
             return redirect()->back()->with('error', 'Wrong Credantials');
         }
     }
    }

    //Admin Logout
    public function admin_logout()
    {
      Auth::logout();
      return redirect('/admin');
    }
    //User Logout
    public function user_logout()
    {
      Auth::logout();
      return redirect('/login');
    }


    //User Login
    public function signin(Request $request)
    {
        if(isset($request->submit) && $request->submit == 'Login')
        {
            $this->validate($request,[
                'type'=>'required'
            ]);
            //Researcher Login
        if($request->type == 3)
        {
            if (Auth::check()) {
                if(Auth::user()->userRole == 3)
                {
                 return redirect('/reseacherdash');
                }
             }
             if(isset($request->user) && isset($request->password))
             {
                 $credentials = $request->only('user', 'password');

                 if (Auth::attempt($credentials)) {
                     $user = Auth::user();
                     if($user->status == 1 && $user->userRole == 3)
                     {
                         return redirect('/reseacherdash');
                     }
                    else
                     {
                         Auth::logout();
                         if($user->userRole != 3)
                         {
                             return redirect()->back()->with('error', 'Wrong Credantials');
                         }

                         if($user->status == 0)
                         {
                             return redirect()->back()->with('error', 'Your Account is under review');
                         }
                         else if($user->status == 2)
                         {
                             return redirect()->back()->with('error', 'Your Account Rejected');
                         }
                         else if($user->status == 3)
                         {
                             return redirect()->back()->with('error', 'Your Account Deleted');
                         }
                     }
                 }
                 else
                 {
                     return redirect()->back()->with('error', 'Wrong Credantials');
                 }
             }
        }

        //Buyer Login
        if($request->type == 2)
        {
            if (Auth::check()) {
                if(Auth::user()->userRole == 2)
                {
                 return redirect('/buyerdash');
                }
             }
             if(isset($request->user) && isset($request->password))
             {
                 $credentials = $request->only('user', 'password');

                 if (Auth::attempt($credentials)) {
                     $user = Auth::user();
                     if($user->status == 1 && $user->userRole == 2)
                     {
                         return redirect('/buyerdash');
                     }
                    else
                     {
                         Auth::logout();
                         if($user->userRole != 2)
                         {
                             return redirect()->back()->with('error', 'Wrong Credantials');
                         }

                         if($user->status == 0)
                         {
                             return redirect()->back()->with('error', 'Your Account is under review');
                         }
                         else if($user->status == 2)
                         {
                             return redirect()->back()->with('error', 'Your Account Rejected');
                         }
                         else if($user->status == 3)
                         {
                             return redirect()->back()->with('error', 'Your Account Deleted');
                         }
                     }
                 }
                 else
                 {
                     return redirect()->back()->with('error', 'Wrong Credantials');
                 }
             }
        }


    }
}



}
