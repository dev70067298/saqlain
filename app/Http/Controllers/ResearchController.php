<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\User;
use App\comments;
use App\service;
use App\research;
use App\adminService;
use App\asset;
use App\market;
use App\bidding;

class ResearchController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }


     //Research Information
     public function researches()
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
          $services=service::where('provider',$user->id)->get();
          $research=research::where('researcher',$user->id)->get();
         return view('researcher.research')
         ->with(array('research'=>$research,'services'=>$services,'admin'=>$admin,'chat_users'=>$chat_users,'user'=>$user));

     }


     //Add New Research
     public function add_research(Request $request)
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
        if(isset($request->submit) && $request->submit == 'Publish')
        {
          $this->validate($request,[
            'service'=>'required',
            'detail' => 'required',
            'file' => 'required|mimes:pdf,docx'
        ]);
            $user=Auth::user();
            $research = new research;
            $research->researcher=$user->id;
            $research->service=$request->service;
            $research->detail=$request->detail;
            $path=$request->file->store('file');
            $research->file=$path;
            $research->save();
            return redirect()->back()->with('success','Your Signal Uploaded');

        }
     }

     //Edit Research Page
     public function edit_research($id)
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
          $services=service::where('provider',$user->id)->get();
          $research=research::find($id);
         return view('researcher.edit_research')
         ->with(array('research'=>$research,'services'=>$services,'admin'=>$admin,'chat_users'=>$chat_users,'user'=>$user));
     }



      //Update New Research
      public function update_research(Request $request,$id)
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
         if(isset($request->update) && $request->update == 'Update')
         {
           $this->validate($request,[
             'detail'=>'required',
             'service'=>'required|integer',
             'file' =>'mimes:pdf,docx'
         ]);
            $user=Auth::user();
            $research = research::find($id);
            $research->service=$request->service;
            $research->detail=$request->detail;
             if(isset($request->file))
             {
                 $older=$research->file;
                 Storage::delete($older);
                 $path=$request->file->store('file');
                 $research->file=$path;
             }
             $research->save();
             if($research->save())
             {
                 return redirect()->back()->with('success','Your Product Updated');
             }
             else
             {
                 return redirect()->back()->with('error','Your Product Not Updated');

             }
         }
      }


      //Edit Research Status
     public function change_research_status($id,$value)
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
          $research = research::find($id);
          $research->status=$value;
          $research->save();
          return redirect()->back()->with('success','Product Status Updated');

     }


      //Edit Research Status
      public function bid_product()
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
           $services=service::where('provider',$user->id)->get();
           $bids=bidding::where('Provider',$user->id)->get();
          return view('researcher.bid')->with(array('bids'=>$bids,'services'=>$services,'admin'=>$admin,'chat_users'=>$chat_users,'user'=>$user));

      }


       //Edit Research Status
       public function del_bid($id)
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
            $bids=bidding::find($id);
            $bids->delete();
            return redirect()->back()->with('success','Bid Deleted Successfully');
       }


      //Add Bid in DB
      public function add_bid(Request $request)
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
           if(isset($request->submit) && $request->submit == 'Submit')
           {
               $this->validate($request,[
                   'product_id'=>'required|numeric',
                   'date'=>'required|date|after:yesterday',
                   'start'=>'required',
                   'end'=>'required'
               ]);
               if($request->start >= $request->end )
               {
                   return redirect()->back()->with('error','Bidding End time must be after Bidding Start Time ');
               }
                $bid=new bidding;
                $bid->product_id=$request->product_id;
                $bid->date=$request->date;
                $bid->start=$request->start;
                $bid->end=$request->end;
                $bid->Provider=Auth::user()->id;
                $bid->bid=0;
                $bid->save();
                $pro=service::find($request->product_id);
                $details=[
                    'title'=>'New Bidd Add on Auction Master',
                    'name'=>$pro->product_name,
                    'image'=>$pro->file,
                    'price'=>$pro->price,
                    'start'=>$request->start,
                    'end'=>$request->end,
                    'date'=>$request->date
                ];
                $usermail=User::where('userRole',2)->get();
                foreach($usermail as $to){
                \Mail::to($to->email)->send(new \App\Mail\TestMail($details));
            }
                return redirect()->back()->with('success','Bidding Date And Time set');

           }
      }

}
