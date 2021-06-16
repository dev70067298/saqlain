<?php

namespace App\Http\Controllers;
use App\Announcement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    public function index()
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
         $events=Announcement::all();
         $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();

        return view('admin.annoucement.annoucement')->with(array('chat_users'=>$chat_users,'events'=>$events));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();
        return view('admin.annoucement.create_annoucement')->with(array('chat_users'=>$chat_users));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

$events=new Announcement();
               $this->validate($request,[
                'title'=>'required'
               ]);



            $events->title=$request->title;


            if($events->save())
            {
                return redirect('announcements')->with('success','Annoucment Added');
            }
            else
            {
                return redirect()->back()->with('error','Annoucment Not Added Try Again');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($announcement)
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
         $user=Announcement::find($announcement);
         $user->delete();
         return redirect()->back()->with('success','Announcement Deleted');
    }

}
