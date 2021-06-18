<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\User;
use App\comments;
use App\service;
use App\asset;
use App\adminService;
use App\market;
use App\gt;
use App\gp;
use App\group_content;
class ResearcherController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }
    //Researcher Dashboard
    public function reseacherdash()
    {
        if (Auth::check()) {
            if($this->user->userRole != 3)
            {
             return redirect('/login');
            }
         }
         else
         {
             return redirect('/login');
         }
         $user=Auth::user();
         $chat_users=User::where('userRole',2)->orderBy('id','desc')->get();
         $admin=User::where('userRole',1)->first();
        return view('researcher.dashboard')->with(array('admin'=>$admin,'chat_users'=>$chat_users,'user'=>$user));
    }

     //Researcher Profile
     public function researcher_profile()
     {
         if (Auth::check()) {
             if($this->user->userRole != 3)
             {
              return redirect('/login');
             }
          }
          else
          {
              return redirect('/login');
          }
          $user=Auth::user();
          $chat_users=User::where('userRole',2)->orderBy('id','desc')->get();
          $admin=User::where('userRole',1)->first();
         return view('researcher.researcher_profile')->with(array('admin'=>$admin,'chat_users'=>$chat_users,'user'=>$user));
     }


     //Update Profile
     public function researcher_profile_update(Request $request,$id)
     {
        if (Auth::check()) {
            if($this->user->userRole != 3)
            {
             return redirect('/login');
            }
         }
         else
         {
             return redirect('/login');
         }
          if(isset($request->submit) && $request->submit=='Update')
            {
             $messages = [
                 'dimensions' => 'Allowed Image Dimension: Width: 200-225 And Height: 200-225',
             ];
                $this->validate($request,[
                 'name'=>'required',
                 'user'=>'required',
                 'email'=>'required|email'
                ]);
             $user=User::find($id);
                 //Check Unique Username
             if($request->user!=$user->user)
             {
                 $this->validate($request,[
                     'user'=>'unique:users,user'
                    ]);
             }
               //Check Unique Email
             if($request->email!=$user->email)
             {
                 $this->validate($request,[
                     'email'=>'unique:users,email'
                    ]);
             }
             if(isset($request->image))
             {
                 $this->validate($request,[
                     'image'=>'dimensions:min_width=200,max_width=225,min_height=200,max_height=225'
                 ],$messages);
             $path1=$user->image;
             Storage::delete($path1);
             $path=$request->image->store('user');
             $user->image=$path;
             }
             $user->name=$request->name;
             $user->user=$request->user;
             $user->email=$request->email;
             $user->save();
             if($user->save())
             {
                 return redirect()->back()->with('success','Your Profile Updated');
             }
             else
             {
                 return redirect()->back()->with('error','Your Profile Not Updated');
             }
            }
     }


      //Researcher Service Page
      public function research_service()
      {
          if (Auth::check()) {
              if($this->user->userRole != 3)
              {
               return redirect('/login');
              }
           }
           else
           {
               return redirect('/login');
           }
           $user = Auth::user();
           $chat_users=User::where('userRole',2)->orderBy('id','desc')->get();
           $admin=User::where('userRole',1)->first();
           $data=gt::join('group','gt.g_id','=','group.id')
           ->select('group.group_name','group.id')->where('gt.t_id',$user->id)
           ->get();
          return view('researcher.service')->with(array('data'=>$data,'admin'=>$admin,'chat_users'=>$chat_users,'user'=>$user));
      }



      //Add New Service
     public function researcher_service(Request $request)
     {
        if (Auth::check()) {
            if($this->user->userRole != 3)
            {
             return redirect('/login');
            }
         }
         else
         {
             return redirect('/login');
         }
          if(isset($request->submit) && $request->submit=='Submit')
            {
                $this->validate($request,[
                 'product'=>'required',   
                 'price'=>'required|numeric',
                 'description'=>'required'
                ]);
                $user=Auth::user();
                $service=new service;
                $service->product_name=$request->product;
                $service->price=$request->price;
                $service->description=$request->description;
                if(isset($request->image))
                {
                    $path=$request->image->store('image/services');
                    $service->file=$path;
                }
                $service->provider=$user->id;
                $service->save();
                if($service->save())
                {
                    return redirect()->back()->with('success','Your Product Added');
                }
                else
                {
                    return redirect()->back()->with('error','Your Product Not Added');
                }
            }
     }

      //Delete Service
      public function delete_service($id)
      {
          if (Auth::check()) {
              if($this->user->userRole != 3)
              {
               return redirect('/login');
              }
           }
           else
           {
               return redirect('/login');
           }
           $service=service::find($id);
           $path1=$service->file;
           Storage::delete($path1);
           $service->delete();
           return redirect()->back()->with('success','Product Deleted');
      }

      public function group_teacher_data($id)
      {
          if (Auth::check()) {
              if($this->user->userRole != 3)
              {
               return redirect('/login');
              }
           }
           else
           {
               return redirect('/login');
           }
           $gp=gp::join('projects','gp.p_id','=','projects.id')->select('projects.title','projects.description')->where('gp.g_id',$id)->get();
           $users=User::where('group_id',$id)->get();
           $chat_users=User::where('userRole',2)->orderBy('id','desc')->get();
           $admin=User::where('userRole',1)->first();

           return view('researcher.groupdata')->with(array('gp'=>$gp,'admin'=>$admin,'chat_users'=>$chat_users,'student'=>$users));

      }

      public function sharecontent($id)
      {
          if (Auth::check()) {
              if($this->user->userRole != 3)
              {
               return redirect('/login');
              }
           }
           else
           {
               return redirect('/login');
           }
           $content=group_content::where('g_id',$id)->get();
           $chat_users=User::where('userRole',2)->orderBy('id','desc')->get();
           $admin=User::where('userRole',1)->first();

           return view('researcher.sharecontent')->with(array('admin'=>$admin,'chat_users'=>$chat_users,'data'=>$content,'group_id'=>$id));

      }


      public function storecontent(Request $request)
      {
         if (Auth::check()) {
             if($this->user->userRole != 3)
             {
              return redirect('/login');
             }
          }
          else
          {
              return redirect('/login');
          }

          $gc = new group_content;
$gc->title = $request->title;
                 if(isset($request->path))
                 {
                    
                     $path=$request->path->store('image/groupcontent');
                     $gc->path=$path;
                 }
                 $gc->g_id=$request->g_id;
                
                 if($gc->save())
                 {
                     return redirect()->back()->with('success','Your content shared');
                 }
                 else
                 {
                     return redirect()->back()->with('error','Your content Not shared');
                 }
             }
      


}
