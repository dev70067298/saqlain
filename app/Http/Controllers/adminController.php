<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\User;
use App\comments;
use App\asset;
use App\adminService;
use App\market;
use App\package;

class adminController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }
    public function index()
    {
        return view('admin.index');
    }

    //Admin Dashboard
    public function dashboard()
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
         $researcher=User::where('userRole',3)->orderBy('id','desc')->limit(3)->get();
         $buyer=User::where('userRole',2)->orderBy('id','desc')->limit(3)->get();
         $comment=comments::limit(3)
         ->join('users','comments.user','=','users.id')
         ->select('comments.comment','users.user')
         ->get();
         $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();
         return view('admin.dashboard')->with(array('chat_users'=>$chat_users,'comment'=>$comment,'researcher'=>$researcher,'buyer'=>$buyer));
    }

    //Researcher List
    public function researcher_list()
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
         $researcher=User::where('userRole',3)->whereIn('status',[1,2,3])->orderBy('id', 'desc')->get();
         $request=User::where('userRole',3)->where('status',0)->count();
         $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();

        return view('admin.researcher')->with(array('chat_users'=>$chat_users,'researcher'=>$researcher,'request'=>$request));
    }


     //Buyer List
     public function buyer_list()
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
          $buyer=User::where('userRole',2)->orderBy('id', 'desc')->get();
          $request=User::where('userRole',2)->where('status',0)->count();

          $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();

         return view('admin.buyer')->with(array('chat_users'=>$chat_users,'buyer'=>$buyer,'request'=>$request));
     }

      //Researcher Request
      public function researcher_request()
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
           $request=User::where('userRole',2)->where('status',0)->orderBy('id','desc')->get();
           $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();

          return view('admin.researcher_request')->with(array('chat_users'=>$chat_users,'request'=>$request));
      }


       //Admin Profile page
       public function admin_profile()
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
            $user=Auth::user();
            $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();

           return view('admin.admin_profile')->with(array('chat_users'=>$chat_users,'user'=>$user));
       }

        //Deactivate Buyer
        public function deactive_buyer($id)
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
             $user=User::find($id);
             $user->status=3;
             $user->save();
             if($user->save())
             {
                 return redirect()->back()->with('success','Buyer Account Suspended');
             }
             else{
                return redirect()->back()->with('error','Buyer Account not Suspended');

             }
        }


         //Delete Buyer
         public function del_buyer($id)
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
              $user=User::find($id);
              $user->delete();
              return redirect()->back()->with('success','Buyer Account Deleted');
         }


          //Deactivate Researcher
        public function deactive_researcher($id)
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
             $user=User::find($id);
             $user->status=3;
             $user->save();
             if($user->save())
             {
                 return redirect()->back()->with('success','Seller Account Suspended');
             }
             else{
                return redirect()->back()->with('error','Seller Account not Suspended');

             }
        }


         //Delete Researcher
         public function del_researcher($id)
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
              $user=User::find($id);
              $user->delete();
              return redirect()->back()->with('success','Seller Account Deleted');
         }
   


          //Accept Researcher
        public function accept_researcher($id)
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
             $user=User::find($id);
             $user->status=1;
             $user->save();
             if($user->save())
             {
                 return redirect()->back()->with('success','Seller Account Accepted');
             }
             else{
                return redirect()->back()->with('error','Seller Account not Accepted');

             }
        }

         //Reject Researcher
         public function reject_researcher($id)
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
              $user=User::find($id);
              $user->status=2;
              $user->save();
              if($user->save())
              {
                  return redirect()->back()->with('success','Seller Account Rejected');
              }
              else{
                 return redirect()->back()->with('error','Seller Account not Rejected');
 
              }
         }

          //Edit Buyer Page
          public function edit_buyer($id)
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
               $user=User::find($id);
               $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();

               return view('admin.edit_buyer')->with(array('user'=>$user,'chat_users'=>$chat_users));
          }

          //Edit Buyer in database
          public function buyer_update(Request $request,$id)
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
               if(isset($request->submit) && $request->submit=='Update')
               {
             
                   
                 
                
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

                $user->name=$request->name;
                $user->user=$request->user;
                $user->email=$request->email;
                $user->cnic=$request->cnic;
                $user->address=$request->address;
                $user->credit=$request->credit;
                $user->status=$request->status;
                $user->save();
                if($user->save())
                {
                 
                    return redirect()->back()->with('success','Volunteer Account Updated');
                }
                else
                {
                 
                    return redirect()->back()->with('error','Volunteer Account Not Updated');
                }
               }
          }


           //Edit Researcher Page
           public function edit_researcher($id)
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
                $user=User::find($id);
                $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();

                return view('admin.edit_researcher')->with(array('chat_users'=>$chat_users,'user'=>$user));
           }


           //Edit Researcher in database
          public function researcher_update(Request $request,$id)
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
               if(isset($request->submit) && $request->submit=='Update')
               {
                   $this->validate($request,[
                    'name'=>'required',
                    'user'=>'required',
                    'email'=>'required|email',
                    'status'=>'required'
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

                $user->name=$request->name;
                $user->user=$request->user;
                $user->email=$request->email;
                $user->status=$request->status;
                $user->save();
                if($user->save())
                {
                    return redirect()->back()->with('success','Seller Account Updated');
                }
                else
                {
                    return redirect()->back()->with('error','Seller Account Not Updated');
                }
               }
          }

           //Enable Buyer
        public function accept_buyer($id)
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
             $user=User::find($id);
             $user->status=1;
             $user->save();
             if($user->save())
             {
                 return redirect()->back()->with('success','Buyer Account Enabled');
             }
             else{
                return redirect()->back()->with('error','Buyer Account not Enabled');

             }
        }

        //Update Profile
        
            public function admin_profile_update(Request $request,$id)
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
                    return redirect()->back()->with('success','Admin Profile Updated');
                }
                else
                {
                    return redirect()->back()->with('error','Admin Profile Not Updated');
                }
               }
        }
        

         //Admin Comments Page
         public function admin_comment()
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
              $comment=comments::
              join('users','comments.user','=','users.id')
              ->select('comments.comment','users.user')
              ->get();
              $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();

              return view('admin.admin_comment')->with(array('chat_users'=>$chat_users,'comment'=>$comment));
         }


         //Asset page
         public function assets()
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
                $asset=asset::get();
                $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();
              return view('admin.assets')->with(array('chat_users'=>$chat_users,'asset'=>$asset));
         }


         //Asset save in DB
         public function add_asset(Request $request)
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
              if(isset($request->submit) && $request->submit == "Submit")
              {
                  $this->validate($request,[
                      'asset'=>'required|unique:assets,name'
                  ]);
               $asset=new asset;
               $asset->name=$request->asset;
               $asset->save();
               return redirect()->back()->with('success','Asset Added Successfully');
              }
         }

         //Delete Asset
         public function del_asset($id)
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
                $asset=asset::find($id);
                $asset->delete();
                return redirect()->back()->with('success','Asset Deleted Successfully');
            }


            //Service page
         public function admin_service()
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
                $service=adminService::get();
                $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();
              return view('admin.services')->with(array('chat_users'=>$chat_users,'service'=>$service));
         }


          //Service save in DB
          public function add_service(Request $request)
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
               if(isset($request->submit) && $request->submit == "Submit")
               {
                   $this->validate($request,[
                       'service'=>'required|unique:admin_services,name'
                   ]);
                $service=new adminService;
                $service->name=$request->service;
                $service->save();
                return redirect()->back()->with('success','Service Added Successfully');
               }
          }


           //Delete Service
         public function del_service($id)
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
                $asset=adminService::find($id);
                $asset->delete();
                return redirect()->back()->with('success','Service Deleted Successfully');
            }




              //Market Type page
         public function market()
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
                $market=market::get();
                $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();
              return view('admin.market')->with(array('chat_users'=>$chat_users,'market'=>$market));
         }


          //Service save in DB
          public function add_market(Request $request)
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
               if(isset($request->submit) && $request->submit == "Submit")
               {
                   $this->validate($request,[
                       'market'=>'required|unique:markets,name'
                   ]);
                $market=new market;
                $market->name=$request->market;
                $market->save();
                return redirect()->back()->with('success','Market Added Successfully');
               }
          }


           //Delete Service
         public function del_market($id)
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
                $market=market::find($id);
                $market->delete();
                return redirect()->back()->with('success','Market Deleted Successfully');
            }

             //Edit Researcher Page
           public function package()
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
                $package=package::get();
                return view('admin.package')->with(array('package'=>$package,'chat_users'=>$chat_users));
           }


           //Edit Researcher Page
           public function add_package(Request $request)
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
                if(isset($request->submit) && $request->submit == 'Add')
                {
                    $this->validate($request,[
                        'credit'=>'required|numeric',
                        'price'=>'required|numeric'
                    ]);
                    $package=new package;
                    $package->credit=$request->credit;
                    $package->price=$request->price;
                    $package->save();
                    return redirect()->back()->with('success','Package Added Successfully');
                }
               
           }

           //Edit Researcher Page
           public function del_package($id)
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
                $package=package::find($id);
                $package->delete();
                return redirect()->back()->with('success','Package Deleted Successfully');
           }

            //Edit Researcher Page
            public function edit_package($id)
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
                 $package=package::find($id);
                 $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();
               return view('admin.edit_package')->with(array('chat_users'=>$chat_users,'package'=>$package));
            }

            //Edit Researcher Page
           public function update_package(Request $request,$id)
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
                if(isset($request->submit) && $request->submit == 'Update')
                {
                    $this->validate($request,[
                        'credit'=>'required|numeric',
                        'price'=>'required|numeric'
                    ]);
                    $package=package::find($id);
                    $package->credit=$request->credit;
                    $package->price=$request->price;
                    $package->save();
                    return redirect()->back()->with('success','Package Update Successfully');
                }
               
           }

}
