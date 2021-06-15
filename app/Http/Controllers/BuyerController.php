<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\User;
use App\package;
use App\service;
use App\research;
use App\cart;
class BuyerController extends Controller
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
    public function buyerdash()
    {
        if (Auth::check()) {
            if($this->user->userRole != 2)
            {
             return redirect('/login');
            }
         }
         else
         {
             return redirect('/login');
         }
         $user=Auth::user();
         $chat_users=User::where('userRole',3)->orderBy('id','desc')->get();
         $admin=User::where('userRole',1)->first();
        return view('buyer.dashboard')->with(array('admin'=>$admin,'chat_users'=>$chat_users,'user'=>$user));
    }

     //Buyer Profile
     public function buyer_profile()
     {
         if (Auth::check()) {
             if($this->user->userRole != 2)
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
         return view('buyer.profile')->with(array('admin'=>$admin,'chat_users'=>$chat_users,'user'=>$user));
     }


     //Update Profile
     public function buyer_profile_update(Request $request,$id)
     {
        if (Auth::check()) {
            if($this->user->userRole != 2)
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


     //Researcher List
     public function buyer_researcher()
     {
         if (Auth::check()) {
             if($this->user->userRole != 2)
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
          $researcher=User::where('userRole',3)->where('status',1)->orderBy('id','desc')->get();
         return view('buyer.researcher')->with(array('researcher'=>$researcher,'admin'=>$admin,'chat_users'=>$chat_users,'user'=>$user));
     }

     //Services List
     public function service_list($id)
     {
         if (Auth::check()) {
             if($this->user->userRole != 2)
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
          $service=service::where('provider',$id)->orderBy('id','desc')->get();
          $researcher=User::find($id);
         return view('buyer.services')->with(array('researcher'=>$researcher,'service'=>$service,'admin'=>$admin,'chat_users'=>$chat_users,'user'=>$user));
     }

      //Signals List
      public function signal_list($service,$researcher)
      {
          if (Auth::check()) {
              if($this->user->userRole != 2)
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
           $signals=research::where('researcher',$researcher)->where('service',$service)->get();
           $seller=User::find($researcher);
           $service=service::find($service);
          return view('buyer.signal')->with(array('product'=>$service,'seller'=>$seller,'signals'=>$signals,'admin'=>$admin,'chat_users'=>$chat_users,'user'=>$user));
      }

       //Signals List
       public function add_credit()
       {
           if (Auth::check()) {
               if($this->user->userRole != 2)
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
            $package=package::get();
           return view('buyer.credit')->with(array('package'=>$package,'admin'=>$admin,'chat_users'=>$chat_users,'user'=>$user));
       }


        //Signals Download
      public function file_down($id)
      {
          if (Auth::check()) {
              if($this->user->userRole != 2)
              {
               return redirect('/login');
              }
           }
           else
           {
               return redirect('/login');
           }
           $user=Auth::user();
           $signals=research::find($id);
           $service=$signals->service;
           $pricer=service::find($service);
           $price=$pricer->price;
           $credit=$user->credit;
           $now=$credit-$price;
           $user->credit=$now;
           $user->save();
           $pathToFile='image/'.$signals->file;
           return response()->download($pathToFile);
          }


        //Services List
        public function services()
        {
            if (Auth::check()) {
                if($this->user->userRole != 2)
                {
                 return redirect('/login');
                }
             }
             else
             {
                 return redirect('/login');
             }
             $services=service::get();
            return view('buyer.service_list')->with(array('services'=>$services));
        }




       //Retailer Stripe Payment
     public function payment(Request $request)
     {
        if (Auth::check()) {
            if($this->user->userRole != 2)
            {
             return redirect('/login');
            }
         }
         else
         {
             return redirect('/login');
         }
          \Stripe\Stripe::setApiKey('sk_test_51HU1AWDBgTW6OaYYSFWfYxwHUaaUwbXNLhTNhkiQCqaPrOkHT7vzLAgQjAiczzSmuP8QsUblIkfvqXi3SYdURF8K00jmiodGre');
          try {
           $package=$request->input('package');
           $pick=package::find($package);
           $price=$pick->price*100;
            \Stripe\Charge::create (array (
                    "amount" => $price,
                    "currency" => "USD",
                    "source" => $request->input('stripeToken'), // obtained with Stripe.js
                    "description" => "Damora Payment System" 
            ));
            $credit=$pick->credit;
            $user=User::find(Auth::user()->id);
            $current=$user->credit;
            $increment=$current+$credit;
            $user->credit=$increment;
            $user->save();
            return redirect()->back()->with('success','Paymet Successfull');
        } catch ( \Exception $e ) {
            return redirect()->back()->with('error','Paymet Unsuccessfull! Try Again');
        }
     }

      //Add product to cart
      public function cart(Request $request)
      {
           if(isset($request->submit) && $request->submit=='Add to Cart')
             {
                 $this->validate($request,[
                  'quantity'=>'required'
                 ]);
                 $user=Auth::user();
                 $cart=new cart;
                 $cart->productid=$request->pId;
                 $cart->userid=$user->id;
                 $cart->quantity=$request->quantity;
                 $cart->total_price=$request->product_price * $request->quantity;
                 $cart->detail=$request->detail;
                 $cart->save();
                 if($cart->save())
                 {
                     return redirect()->back()->with('success','Your product added to cart');
                 }
                 else
                 {
                     return redirect()->back()->with('error','Your product Not Added to cart');
                 }
             }
      }
            //Add product to cart
            public function order(Request $request)
            {
                if (Auth::check()) {
                    if($this->user->userRole != 2)
                    {
                     return redirect('/login');
                    }
                 }
                 else
                 {
                     return redirect('/login');
                 }
                 $user=Auth::user();
                 $cart=cart::where('userid',$user->id)->orderBy('id','desc')->get();
                 
                 return view('buyer.order')->with(array('cart'=>$cart));
            }

//Delete order
public function delete_order($id)
{
     $cart=cart::find($id);
     $cart->delete();
     return redirect()->back()->with('success','Product In Cart Deleted');
}

}
