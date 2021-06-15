<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\User;
use App\comments;
use App\asset;
use App\service;
use App\market;
use App\package;
use App\bidding;
use Carbon\Carbon;

class bidController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

     //Signals Download
     public function buyer_bid()
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

          $bids=bidding::where('winner',null)->get();
          date_default_timezone_set("Asia/Karachi");
          $now   = Carbon::now();
          $time  = $now->format('H:i:s');
          $dater= $now->format('Y-m-d');
          return view('buyer.bids')->with(array('bids'=>$bids,'time'=>$time,'dater'=>$dater));
         }

         public function your_bid($id)
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

          $bid=bidding::find($id);
          date_default_timezone_set("Asia/Karachi");
          $now   = Carbon::now();
          $time  = $now->format('H:i:s');
          $dater= $now->format('Y-m-d');
          $product=service::find($bid->product_id);
          return view('buyer.bid')->with(array('product'=>$product,'bid'=>$bid,'time'=>$time,'dater'=>$dater));

         }

         public function send_bid(Request $request,$id)
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
          if(isset($request->submit))
          {
              $win=0;
            date_default_timezone_set("Asia/Karachi");
            $now   = Carbon::now();
            $time  = $now->format('H:i:s');
            $dater= $now->format('Y-m-d');
            $bid=bidding::find($id);
            $buyer=$bid->Provider;
            if($bid->bid >= $request->bid)
            {
                return redirect()->back()->with('error','Your Bid must be greater than Maximum Bid');
            }
            $bid->bid=$request->bid;
            $bid->last_bider=Auth::user()->id;
            if($time >= $bid->end || $bid->date < $dater)
            {
                $bid->winner=Auth::user()->id;
                $win=1;
            }
            $bid->save();
            $username=User::find($buyer);
            $pr=User::find($bid->product_id);
            $buyername=User::find($bid->winner);

            if($win == 1)
            {
                $detail=[
                    'title'=>'Congratulation on Winning Bid',
                    'name'=>$pr->product_name,
                    'image'=>$pr->file,
                    'price'=>$bid->bid,
                    'start'=>$bid->start,
                    'end'=>$bid->end,
                    'date'=>$bid->date,
                    'seller'=>$username->name,
                    'buyer'=>$buyername->name,
                ];
                $detail1=[
                    'title'=>'Congratulation on Your Product Bid Winning',
                    'name'=>$pr->product_name,
                    'image'=>$pr->file,
                    'price'=>$bid->bid,
                    'start'=>$bid->start,
                    'end'=>$bid->end,
                    'date'=>$bid->date,
                    'seller'=>$username->name,
                    'buyer'=>$buyername->name,
                ];

                \Mail::to($buyername->email)->send(new \App\Mail\ConMail($detail));
                \Mail::to($username->email)->send(new \App\Mail\SendMail($detail1));
                return redirect()->route('buyer_chat', [$buyer]);
            }
            return redirect()->back()->with(array('success'=>'Your Bid Submitted'));

          }
         }


         //bidding page

         public function Biddingpage()
         {


              $bids=bidding::where('winner',null)->get();
              return view('pages.bidpage')->with(array('bids'=>$bids));
             }

         //home page

         public function home()
         {


              return view('pages.home');
             }

         //about page

         public function about()
         {


              return view('pages.about');
             }


}
